<?php

namespace App\Services\Dishes\Reposotories;

use App\Models\Category;
use App\Models\Dish;

class DishesRepository
{

    public function getAllByCategoryId(int $categoryId)
    {
        return Category::find($categoryId)->dishes()->get();
    }

    public function getAll()
    {
        return Dish::all();
    }

    public function getById(int $id): Dish
    {
        return Dish::find($id);
    }

}
