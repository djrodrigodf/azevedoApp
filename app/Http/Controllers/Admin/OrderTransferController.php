<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderTransfer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderTransferController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-transfer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_transfer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-transfer.create');
    }

    public function edit(OrderTransfer $orderTransfer)
    {
        abort_if(Gate::denies('order_transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-transfer.edit', compact('orderTransfer'));
    }

    public function show(OrderTransfer $orderTransfer)
    {
        abort_if(Gate::denies('order_transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTransfer->load('requestBy', 'approverBy');

        return view('admin.order-transfer.show', compact('orderTransfer'));
    }
}
