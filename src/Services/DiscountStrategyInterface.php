<?php
namespace App\Services;

interface DiscountStrategyInterface {
    public function applyDiscount(float $price): float;
}
