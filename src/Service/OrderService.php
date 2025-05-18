<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\OrderDTO;
use App\Repository\OrderRepository;

final class OrderService
{
    public function __construct(
       private OrderRepository $orderRepository
    ) {
    }

    /**
     * @param OrderDTO $order
     * @return int
     */
    public function processOrder(OrderDTO $order): int
    {
        return $this->orderRepository->save(order: $order);
    }
}
