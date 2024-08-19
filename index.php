<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/api/Route/main.php';

use Api\Core\Request;
use Api\Core\Router;


$request = new Request();

$router->dispatch($request);
