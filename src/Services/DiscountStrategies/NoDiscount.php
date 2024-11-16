<?php
namespace App\Services\DiscountStrategies;

use App\Services\DiscountStrategyInterface;

class NoDiscount implements DiscountStrategyInterface {
    public function applyDiscount(float $price): float {
        return $price; // Sin descuento
    }
}
