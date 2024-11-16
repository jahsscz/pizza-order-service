<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Factories\PizzaFactoryInterface;
use App\Services\DiscountService;

class OrderController {
    private PizzaFactoryInterface $pizzaFactory;
    private DiscountService $discountService;

    public function __construct(PizzaFactoryInterface $pizzaFactory, DiscountService $discountService) {
        $this->pizzaFactory = $pizzaFactory;
        $this->discountService = $discountService;
    }

    public function placeOrder(Request $request, Response $response): Response {
        try {
            $data = $request->getParsedBody();
            $pizza = $this->pizzaFactory->create($data);

            $dayOfWeek = date('l');
            $discountStrategy = $this->discountService->getStrategy($dayOfWeek);
            $finalPrice = $discountStrategy->applyDiscount($pizza->price);

            return $response->withJson(['pizza' => $pizza, 'finalPrice' => $finalPrice], 200);
        } catch (\Exception $e) {
            return $response->withJson(['error' => $e->getMessage()], 400);
        }
    }
}
