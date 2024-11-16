<?php
namespace App\Services\DiscountStrategies;

use App\Services\DiscountStrategyInterface;

class TwoForOneDiscount implements DiscountStrategyInterface {
    public function applyDiscount(float $price): float {
        return $price / 2; // Descuento 2x1
    }
}
