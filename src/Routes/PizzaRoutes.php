<?php
use Slim\App;
use App\Factories\PredefinedPizzaFactory;

return function (App $app) {
    $app->get('/pizzas', function ($request, $response) {
        $pizzaFactory = new PredefinedPizzaFactory();
        $pizzas = $pizzaFactory->getAllPizzas();

        return $response->withJson($pizzas, 200);
    });
};
