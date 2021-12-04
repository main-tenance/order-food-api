<?php

namespace App\Services\Orders\Handlers;

use App\Models\Order;
use App\Services\Companies\CompaniesService;
use App\Services\Dishes\DishesService;
use App\Services\Orders\Exceptions\OrderCreateException;
use App\Services\Orders\Repositories\OrderLineRepository;
use App\Services\Orders\Repositories\OrdersRepository;

class OrderCreateHandler
{
    private DishesService $dishesService;
    private OrdersRepository $ordersRepository;
    private OrderLineRepository $orderLineRepository;
    private CompaniesService $companiesService;

    public function __construct(
        DishesService $dishesService,
        CompaniesService $companiesService,
        OrdersRepository $ordersRepository,
        OrderLineRepository $orderLineRepository
    )
    {
        $this->dishesService = $dishesService;
        $this->ordersRepository = $ordersRepository;
        $this->orderLineRepository = $orderLineRepository;
        $this->companiesService = $companiesService;
    }

    public function handle(array $data): Order
    {
        $lines = $this->getLines($data);
        if (empty($lines)) {
            throw new OrderCreateException('No order lines');
        }

        $order = $this->ordersRepository->create($data);
        $sum = 0;
        foreach ($lines as $line) {
            $line['order_id'] = $order->id;
            $orderLine = $this->orderLineRepository->create($line);
            $sum += $orderLine->price * $orderLine->quantity;
        }

        if ($sum > 0) {
            $order->sum = $sum;
            $order->save();
        } else {
            $order->delete();
        }

        return $order->load('lines');
    }

    private function getLines(array $data): array
    {
        $lines = [];
        $companyDishes = $this->companiesService->getById($data['company_id'])->dishes()->get();
        foreach ($data['lines'] as $line) {
            if ($line['quantity'] <= 0) {
                continue;
            }

            $dish = $this->dishesService->getById($line['dish_id']);
            if (!$dish || !$companyDishes->contains($dish)) {
                continue;
            }

            $line['price'] = $dish->price;
            $lines[] = $line;
        }

        return $lines;
    }
}
