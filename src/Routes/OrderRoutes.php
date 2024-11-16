<?php
use Slim\App;
use App\Controllers\OrderController;
use App\Factories\CustomPizzaFactory;
use App\Services\DiscountService;

return function (App $app) {
    $app->post('/orders/order', function ($request, $response) {
        $pizzaFactory = new CustomPizzaFactory(); // Cambiar a PredefinedPizzaFactory si es necesario
        $discountService = new DiscountService();
        $controller = new OrderController($pizzaFactory, $discountService);
        return $controller->placeOrder($request, $response);
    });
};
