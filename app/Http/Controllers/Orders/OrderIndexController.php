<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrdersResource;
use App\Services\Orders\OrdersService;
use Illuminate\Http\Request;

class OrderIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Orders\OrdersService  $ordersService
     * @return \App\Http\Resources\Orders\OrdersResource
     */
    public function __invoke(Request $request, OrdersService $ordersService): OrdersResource
    {
        $orders = $ordersService->getAll($request->get('company_id'));

        return new OrdersResource($orders);
    }
}
