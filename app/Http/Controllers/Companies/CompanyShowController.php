<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Companies\CompanyResource;
use App\Models\Company;
use App\Models\Dish;

class CompanyShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Company  $company
     * @return \App\Http\Resources\Companies\CompanyResource
     */
    public function __invoke(Company $company): CompanyResource
    {
//        $dish = Dish::find(1);
//        dump($company->categories()->with('dishes')->get());
        dump($company->dishes()->get());
        $a = $company->dishes()->get()->contains(Dish::find(6));
        dump($a);

        return new CompanyResource($company);
    }
}
