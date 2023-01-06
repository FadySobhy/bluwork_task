<?php

namespace App\Actions\Contracts\Orders;

use App\Models\Order;

interface StoreOrder
{
    /**
     * @param array $data
     * @return Order
     */
    public function handle(array $data): Order;
}
