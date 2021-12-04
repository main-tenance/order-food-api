<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderCreateRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Services\Orders\OrdersService;

class OrderStoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Orders\OrderCreateRequest  $request
     * @return \App\Http\Resources\Orders\OrderResource
     */
    public function __invoke(OrderCreateRequest $request, OrdersService $ordersService): OrderResource
    {
        $data = $request->getFormData();
        $order = $ordersService->store($data);
        http_response_code(201);

        return new OrderResource($order);
    }
}
