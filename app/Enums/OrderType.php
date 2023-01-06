<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DineIn()
 * @method static static Delivery()
 * @method static static Takeaway()
 */
final class OrderType extends Enum
{
    const DineIn = '1';
    const Delivery = '2';
    const Takeaway = '3';
}
