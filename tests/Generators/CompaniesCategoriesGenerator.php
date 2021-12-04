<?php

namespace Tests\Generators;

use App\Models\Category;
use App\Models\CategoryCompany;
use App\Models\Company;

class CompaniesCategoriesGenerator
{
    public static function create(int $companiesCount, int $categoriesCount): void
    {
        Company::factory($companiesCount)->create();
        Category::factory($categoriesCount)->create();
        foreach (Company::all() as $company) {
            $categories = Category::inRandomOrder()->limit(rand(1, $categoriesCount))->get();
            foreach ($categories as $category) {
                CategoryCompany::create([
                    'company_id' => $company->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
