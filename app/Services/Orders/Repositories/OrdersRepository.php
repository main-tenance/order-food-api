<?php

namespace App\Services\Orders\Repositories;

use App\Models\Company;
use App\Models\Order;

class OrdersRepository
{
    public function getAllByCompanyId(int $companyId)
    {
        return Company::findOrFail($companyId)->orders()->get();
    }

    public function getAll()
    {
        return Order::all();
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

}
