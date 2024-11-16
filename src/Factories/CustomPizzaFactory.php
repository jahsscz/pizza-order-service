<?php
namespace App\Factories;

use App\Models\Pizza;

class CustomPizzaFactory implements PizzaFactoryInterface {
    public function create(array $data): Pizza {
        $ingredients = $data['ingredients'] ?? [];
        $basePrice = 8.0;
        $additionalCost = count($ingredients) * 1.5;
        return new Pizza('Custom Pizza', $ingredients, $basePrice + $additionalCost);
    }
}
