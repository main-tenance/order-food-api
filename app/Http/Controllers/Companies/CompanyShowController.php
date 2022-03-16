<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Companies\CompanyResource;
use App\Models\Company;

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
        return new CompanyResource($company);
    }
}
