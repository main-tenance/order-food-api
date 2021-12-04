<?php

namespace App\Services\Categories;

use App\Services\Categories\Repositories\CategoriesRepository;

class CategoriesService
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getAll($companyId = null)
    {
        if ($companyId) {
            return $this->categoriesRepository->getAllByCompanyId($companyId);
        }

        return $this->categoriesRepository->getAll();
    }

}
