<?php

use App\Http\Controllers\Api\V1\Admin\OrderRequestApiController;
use App\Http\Controllers\Api\V1\Admin\OrderTransferApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Order Request
    Route::apiResource('order-requests', OrderRequestApiController::class);

    // Order Transfer
    Route::apiResource('order-transfers', OrderTransferApiController::class);
});
