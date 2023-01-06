<?php

namespace App\Actions\Contracts\Orders;

use App\Models\Order;

interface StoreOrderItem
{
    /**
     * @param Order $order
     * @param array $data
     * @return void
     */
    public function handle(Order $order, array $data): void;
}
