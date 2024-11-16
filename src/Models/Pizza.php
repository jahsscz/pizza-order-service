<?php
namespace App\Models;

class Pizza {
    public string $name;
    public array $ingredients;
    public float $price;

    public function __construct(string $name, array $ingredients, float $price) {
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->price = $price;
    }
}
