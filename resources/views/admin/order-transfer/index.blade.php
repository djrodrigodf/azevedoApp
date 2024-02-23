@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.orderTransfer.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('order_transfer_create')
                    <a class="btn btn-indigo" href="{{ route('admin.order-transfers.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.orderTransfer.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('order-transfer.index')

    </div>
</div>
@endsection