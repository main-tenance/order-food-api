<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoriesResource;
use App\Services\Categories\CategoriesService;
use Illuminate\Http\Request;

class CategoryIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Categories\CategoriesService  $categoriesService
     * @return \App\Http\Resources\Categories\CategoriesResource
     */
    public function __invoke(Request $request, CategoriesService $categoriesService): CategoriesResource
    {
        $categories = $categoriesService->getAll($request->get('company_id'));

        return new CategoriesResource($categories);
    }

}
