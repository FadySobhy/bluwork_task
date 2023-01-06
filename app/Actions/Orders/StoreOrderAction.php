<?php

namespace App\Actions\Orders;

use App\Actions\Contracts\Orders\StoreOrder;
use App\Models\Order;

class StoreOrderAction implements StoreOrder
{

    /**
     * @param array $data
     * @return Order
     */
    public function handle(array $data): Order
    {
        return Order::create($data);
    }
}
