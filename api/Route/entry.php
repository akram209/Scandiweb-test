<?php

use Api\Core\Router;
use Api\Controller\ProductController;

$router = new Router();

$router->add('GET', 'products', ProductController::class, 'index');
$router->add('POST', 'products', ProductController::class, 'store');
$router->add('POST', 'products-delete', ProductController::class, 'delete');

// More routes can be added here
