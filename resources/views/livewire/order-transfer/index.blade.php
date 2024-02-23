<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('order_transfer_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OrderTransfer" format="csv" />
                <livewire:excel-export model="OrderTransfer" format="xlsx" />
                <livewire:excel-export model="OrderTransfer" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.orderTransfer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.item') }}
                            @include('components.table.sort', ['field' => 'item'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.date_request') }}
                            @include('components.table.sort', ['field' => 'date_request'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.date_processed') }}
                            @include('components.table.sort', ['field' => 'date_processed'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.cost_center') }}
                            @include('components.table.sort', ['field' => 'cost_center'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.request_by') }}
                            @include('components.table.sort', ['field' => 'request_by.name'])
                        </th>
                        <th>
                            {{ trans('cruds.orderTransfer.fields.approver_by') }}
                            @include('components.table.sort', ['field' => 'approver_by.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orderTransfers as $orderTransfer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $orderTransfer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $orderTransfer->id }}
                            </td>
                            <td>
                                {{ $orderTransfer->item }}
                            </td>
                            <td>
                                {{ $orderTransfer->date_request }}
                            </td>
                            <td>
                                {{ $orderTransfer->date_processed }}
                            </td>
                            <td>
                                {{ $orderTransfer->cost_center }}
                            </td>
                            <td>
                                @if($orderTransfer->requestBy)
                                    <span class="badge badge-relationship">{{ $orderTransfer->requestBy->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($orderTransfer->approverBy)
                                    <span class="badge badge-relationship">{{ $orderTransfer->approverBy->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('order_transfer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.order-transfers.show', $orderTransfer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('order_transfer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.order-transfers.edit', $orderTransfer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('order_transfer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $orderTransfer->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $orderTransfers->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush