<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequestRequest;
use App\Http\Requests\UpdateOrderRequestRequest;
use App\Http\Resources\Admin\OrderRequestResource;
use App\Models\OrderRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderRequestResource(OrderRequest::with(['requester'])->get());
    }

    public function store(StoreOrderRequestRequest $request)
    {
        $orderRequest = OrderRequest::create($request->validated());

        return (new OrderRequestResource($orderRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderRequest $orderRequest)
    {
        abort_if(Gate::denies('order_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderRequestResource($orderRequest->load(['requester']));
    }

    public function update(UpdateOrderRequestRequest $request, OrderRequest $orderRequest)
    {
        $orderRequest->update($request->validated());

        return (new OrderRequestResource($orderRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderRequest $orderRequest)
    {
        abort_if(Gate::denies('order_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
