<?php
namespace App\Services;

use App\Services\DiscountStrategies\TwoForOneDiscount;
use App\Services\DiscountStrategies\NoDiscount;

class DiscountService {
    public function getStrategy(string $dayOfWeek): DiscountStrategyInterface {
        if (in_array($dayOfWeek, ['Tuesday', 'Wednesday'])) {
            return new TwoForOneDiscount();
        }
        return new NoDiscount();
    }
}
