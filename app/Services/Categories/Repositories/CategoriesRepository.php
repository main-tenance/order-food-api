<?php

namespace App\Services\Categories\Repositories;

use App\Models\Category;
use App\Models\Company;

class CategoriesRepository
{

    public function getAllByCompanyId(int $companyId)
    {
        return Company::find($companyId)->categories()->get();
    }

    public function getAll()
    {
        return Category::all();
    }

}
