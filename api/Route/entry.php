<?php

use Api\Core\Router;
use Api\Controller\ProductController;

$router = new Router();

$router->add('GET', 'products', ProductController::class, 'index');

// More routes can be added here
