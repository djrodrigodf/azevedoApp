@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.orderTransfer.title_singular') }}:
                    {{ trans('cruds.orderTransfer.fields.id') }}
                    {{ $orderTransfer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('order-transfer.edit', [$orderTransfer])
        </div>
    </div>
</div>
@endsection