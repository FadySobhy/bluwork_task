<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'type' => [
                'value' => $this->type->value,
                'description' => $this->type->description,
            ],
            'creator' => OrderCreatorResource::make($this->whenLoaded('creator')),
            'delivery_fees' => $this->whenNotNull($this->delivery_fees),
            'customer_phone_number' => $this->whenNotNull($this->customer_phone_number),
            'customer_name' => $this->whenNotNull($this->customer_name),
            'table_number' => $this->whenNotNull($this->table_number),
            'service_charge' => $this->whenNotNull($this->service_charge),
            'waiter_name' => $this->whenNotNull($this->waiter_name),
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
