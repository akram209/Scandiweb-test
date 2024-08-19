<?php

require_once __DIR__ . '/vendor/autoload.php';

use Api\Core\Request;
use Api\Core\Route;

$router = require_once __DIR__ . '/api/routes.php';
$request = new Request();

$router->dispatch($request);
