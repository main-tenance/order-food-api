<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Companies\CompaniesResource;
use App\Services\Companies\CompaniesService;
use Illuminate\Http\Request;

class CompanyIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Companies\CompaniesService  $companiesService
     * @return \App\Http\Resources\Companies\CompaniesResource
     */
    public function __invoke(Request $request, CompaniesService $companiesService): CompaniesResource
    {
        $companies = $companiesService->getAll($request->get('category_id'));

        return new CompaniesResource($companies);
    }
}
