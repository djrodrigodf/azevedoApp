@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orderTransfer.title_singular') }}:
                    {{ trans('cruds.orderTransfer.fields.id') }}
                    {{ $orderTransfer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.id') }}
                            </th>
                            <td>
                                {{ $orderTransfer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.item') }}
                            </th>
                            <td>
                                {{ $orderTransfer->item }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.date_request') }}
                            </th>
                            <td>
                                {{ $orderTransfer->date_request }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.date_processed') }}
                            </th>
                            <td>
                                {{ $orderTransfer->date_processed }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.cost_center') }}
                            </th>
                            <td>
                                {{ $orderTransfer->cost_center }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.request_by') }}
                            </th>
                            <td>
                                @if($orderTransfer->requestBy)
                                    <span class="badge badge-relationship">{{ $orderTransfer->requestBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderTransfer.fields.approver_by') }}
                            </th>
                            <td>
                                @if($orderTransfer->approverBy)
                                    <span class="badge badge-relationship">{{ $orderTransfer->approverBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_transfer_edit')
                    <a href="{{ route('admin.order-transfers.edit', $orderTransfer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.order-transfers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection