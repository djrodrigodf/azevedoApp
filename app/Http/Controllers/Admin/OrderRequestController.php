<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-request.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-request.create');
    }

    public function edit(OrderRequest $orderRequest)
    {
        abort_if(Gate::denies('order_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order-request.edit', compact('orderRequest'));
    }

    public function show(OrderRequest $orderRequest)
    {
        abort_if(Gate::denies('order_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderRequest->load('requester');

        return view('admin.order-request.show', compact('orderRequest'));
    }
}
