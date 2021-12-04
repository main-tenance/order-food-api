<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CategoryCompany;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Company::all() as $company) {
            $categories = Category::inRandomOrder()->limit(rand(3, 7))->get();
            foreach ($categories as $category) {
                CategoryCompany::create([
                    'company_id' => $company->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
