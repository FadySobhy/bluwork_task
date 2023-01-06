<?php

namespace App\Http\Controllers\Api\V1\Orders;

use App\Actions\Contracts\Orders\StoreOrder;
use App\Actions\Contracts\Orders\StoreOrderItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\DB;

class MakeOrder extends Controller
{
    /**
     * @param OrderRequest $request
     * @param StoreOrder $storeOrder
     * @param StoreOrderItem $storeOrderItem
     * @return OrderResource
     */
    public function __invoke(
        OrderRequest $request,
        StoreOrder $storeOrder,
        StoreOrderItem $storeOrderItem
    ): OrderResource
    {
        return DB::transaction(function () use ($request, $storeOrder, $storeOrderItem) {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;

            $order = $storeOrder->handle($data);
            $storeOrderItem->handle($order, $data['items']);

            return OrderResource::make($order->load(['items', 'items.item', 'creator']));
        });
    }
}
