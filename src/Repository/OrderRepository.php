<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\OrderDTO;

final class OrderRepository
{
    public function save(OrderDTO $order): int
    {
        //
        return rand(min: 10, max: 100);
    }
}
