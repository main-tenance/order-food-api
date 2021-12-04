<?php

namespace App\Http\Controllers\Dishes;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dishes\DishesResource;
use App\Services\Dishes\DishesService;
use Illuminate\Http\Request;

class DishIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Dishes\DishesService  $dishesService
     * @return \App\Http\Resources\Dishes\DishesResource
     */
    public function __invoke(Request $request, DishesService $dishesService): DishesResource
    {
        $dishes = $dishesService->getAll($request->get('category_id'));

        return new DishesResource($dishes);
    }
}
