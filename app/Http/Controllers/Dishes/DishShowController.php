<?php

namespace App\Http\Controllers\Dishes;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dishes\DishResource;
use App\Models\Dish;

class DishShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Dish  $dish
     * @return \App\Http\Resources\Dishes\DishResource
     */
    public function __invoke(Dish $dish): DishResource
    {
        return new DishResource($dish);
    }
}
