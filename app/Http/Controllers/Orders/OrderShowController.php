<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;

class OrderShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Order  $order
     * @return \App\Http\Resources\Orders\OrderResource
     */
    public function __invoke(Order $order)//: OrderResource
    {
//        return $order;
        return new OrderResource($order);
    }
}
