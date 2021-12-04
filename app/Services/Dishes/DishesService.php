<?php

namespace App\Services\Dishes;

use App\Models\Dish;
use App\Services\Dishes\Reposotories\DishesRepository;

class DishesService
{

    private DishesRepository $dishesRepository;

    public function __construct(DishesRepository $dishesRepository)
    {
        $this->dishesRepository = $dishesRepository;
    }

    public function getAll($categoryId = null)
    {
        if ($categoryId) {
            return $this->dishesRepository->getAllByCategoryId($categoryId);
        }

        return $this->dishesRepository->getAll();
    }

    public function getById(int $id): Dish
    {
        return $this->dishesRepository->getById($id);
    }

}
