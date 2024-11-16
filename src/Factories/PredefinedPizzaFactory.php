<?php
namespace App\Factories;

use App\Models\Pizza;

class PredefinedPizzaFactory implements PizzaFactoryInterface {
    private array $predefinedPizzas;

    public function __construct() {
        $this->predefinedPizzas = [
            new Pizza('Margherita', ['tomato', 'mozzarella', 'basil'], 10.0),
            new Pizza('Pepperoni', ['tomato', 'mozzarella', 'pepperoni'], 12.0),
            new Pizza('Hawaiian', ['tomato', 'mozzarella', 'pineapple', 'ham'], 14.0),
        ];
    }

    public function create(array $data): Pizza {
        $name = $data['name'] ?? '';
        foreach ($this->predefinedPizzas as $pizza) {
            if ($pizza->name === $name) {
                return $pizza;
            }
        }
        throw new \Exception('Pizza not found');
    }

    public function getAllPizzas(): array {
        return array_map(fn($pizza) => [
            'name' => $pizza->name,
            'ingredients' => $pizza->ingredients,
            'price' => $pizza->price
        ], $this->predefinedPizzas);
    }
}
