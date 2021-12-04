<?php

namespace App\Services\Companies;

use App\Models\Company;
use App\Services\Companies\Repositories\CompaniesRepository;

class CompaniesService
{

    private CompaniesRepository $companiesRepository;

    public function __construct(CompaniesRepository $companiesRepository)
    {
        $this->companiesRepository = $companiesRepository;
    }

    public function getAll($categoryId = null)
    {
        if ($categoryId) {
            return $this->companiesRepository->getAllByCategoryId($categoryId);
        }

        return $this->companiesRepository->getAll();

    }

    public function getById(int $id): Company
    {
        return $this->companiesRepository->getById($id);
    }

}
