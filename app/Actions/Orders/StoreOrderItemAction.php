<?php

namespace App\Actions\Orders;

use App\Actions\Contracts\Orders\StoreOrderItem;
use App\Models\Order;
use App\Models\OrderItem;

class StoreOrderItemAction implements StoreOrderItem
{

    /**
     * @param Order $order
     * @param array $data
     * @return void
     */
    public function handle(Order $order, array $data): void
    {
        foreach ($data as $item) {
            $item['order_id'] = $order->id;
            OrderItem::create($item);
        }
    }
}
