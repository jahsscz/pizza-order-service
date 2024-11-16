<?php
namespace App\Models;

class Order {
    public string $id;
    public Pizza $pizza;
    public float $price;
    public string $status;

    public function __construct(Pizza $pizza, float $price) {
        $this->id = uniqid('order_', true);
        $this->pizza = $pizza;
        $this->price = $price;
        $this->status = 'pending'; // Estados posibles: pending, completed, canceled
    }

    public function complete(): void {
        $this->status = 'completed';
    }

    public function cancel(): void {
        $this->status = 'canceled';
    }
}
