<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Services\Orders\Handlers\OrderCreateHandler;
use App\Services\Orders\Repositories\OrdersRepository;

class OrdersService
{

    private OrdersRepository $ordersRepository;
    private OrderCreateHandler $orderCreateHandler;

    public function __construct(
        OrdersRepository $ordersRepository,
        OrderCreateHandler $orderCreateHandler
    )
    {
        $this->ordersRepository = $ordersRepository;
        $this->orderCreateHandler = $orderCreateHandler;
    }

    public function getAll($companyId = null)
    {
        if ($companyId) {
            return $this->ordersRepository->getAllByCompanyId($companyId);
        }

        return $this->ordersRepository->getAll();
    }

    public function store(array $data): Order
    {
        return $this->orderCreateHandler->handle($data);
    }

}
