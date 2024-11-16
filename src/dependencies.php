<?php
use App\Services\DiscountService;

return function ($container) {
    $container->set(DiscountService::class, function () {
        return new DiscountService();
    });
};
