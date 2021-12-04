<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;

class CategoryShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Category  $category
     * @return \App\Http\Resources\Categories\CategoryResource
     */
    public function __invoke(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }
}
