<?php

namespace App\Services\Companies\Repositories;

use App\Models\Category;
use App\Models\Company;

class CompaniesRepository
{
    public function getAllByCategoryId(int $categoryId)
    {
        return Category::findOrFail($categoryId)->companies()->get();
    }

    public function getAll()
    {
        return Company::all();
    }

    public function getById(int $id): Company
    {
        return Company::findOrFail($id);
    }

}
