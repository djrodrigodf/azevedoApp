@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orderRequest.title_singular') }}:
                    {{ trans('cruds.orderRequest.fields.id') }}
                    {{ $orderRequest->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orderRequest.fields.id') }}
                            </th>
                            <td>
                                {{ $orderRequest->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderRequest.fields.item_name') }}
                            </th>
                            <td>
                                {{ $orderRequest->item_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderRequest.fields.amount') }}
                            </th>
                            <td>
                                {{ $orderRequest->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderRequest.fields.required_date') }}
                            </th>
                            <td>
                                {{ $orderRequest->required_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderRequest.fields.requester') }}
                            </th>
                            <td>
                                @if($orderRequest->requester)
                                    <span class="badge badge-relationship">{{ $orderRequest->requester->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_request_edit')
                    <a href="{{ route('admin.order-requests.edit', $orderRequest) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.order-requests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection