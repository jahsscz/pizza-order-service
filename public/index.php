<?php
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

// Configurar contenedor
$container = new Container();
AppFactory::setContainer($container);

// Crear app
$app = AppFactory::create();

// Configurar errores
$app->addErrorMiddleware(true, true, true);

// Registrar configuraciones y dependencias
(require __DIR__ . '/../src/dependencies.php')($container);

// Registrar rutas
(require __DIR__ . '/../src/Routes/OrderRoutes.php')($app);
(require __DIR__ . '/../src/Routes/PizzaRoutes.php')($app);

// Ejecutar aplicación
$app->run();
