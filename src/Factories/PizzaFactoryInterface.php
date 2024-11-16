<?php
namespace App\Factories;

use App\Models\Pizza;

interface PizzaFactoryInterface {
    public function create(array $data): Pizza;
}
