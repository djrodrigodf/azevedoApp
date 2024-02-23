<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderTransferRequest;
use App\Http\Requests\UpdateOrderTransferRequest;
use App\Http\Resources\Admin\OrderTransferResource;
use App\Models\OrderTransfer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderTransferApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTransferResource(OrderTransfer::with(['requestBy', 'approverBy'])->get());
    }

    public function store(StoreOrderTransferRequest $request)
    {
        $orderTransfer = OrderTransfer::create($request->validated());

        return (new OrderTransferResource($orderTransfer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderTransfer $orderTransfer)
    {
        abort_if(Gate::denies('order_transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTransferResource($orderTransfer->load(['requestBy', 'approverBy']));
    }

    public function update(UpdateOrderTransferRequest $request, OrderTransfer $orderTransfer)
    {
        $orderTransfer->update($request->validated());

        return (new OrderTransferResource($orderTransfer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderTransfer $orderTransfer)
    {
        abort_if(Gate::denies('order_transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTransfer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
