<?php

namespace App\Http\Requests;

use App\Enums\OrderType;
use App\Models\Item;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return array_merge([
            'type' => ['required', new EnumValue(OrderType::class)],
            'items' => ['required', 'array', 'min:1'],
            'items.*.item_id' => ['required', 'integer', Rule::exists(Item::class, 'id')],
            'items.*.quantity' => ['required', 'integer'],
        ], $this->getOrderTypeRules($this->type));
    }

    public function getOrderTypeRules($type): array
    {
        return match ($type) {
            OrderType::DineIn => [
                'table_number' => ['required', 'integer'],
                'service_charge' => ['required', 'numeric'],
                'waiter_name' => ['required', 'string', 'max:255'],
            ],
            OrderType::Delivery => [
                'delivery_fees' => ['required', 'numeric'],
                'customer_phone_number' => ['required', 'string', 'regex:/(01)[0-9]{9}/'],
                'customer_name' => ['required', 'string', 'max:255'],
            ],
            default => [],
        };
    }
}
