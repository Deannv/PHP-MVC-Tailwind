<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use Route\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/auth/signin', AuthController::class, 'login');
$router->post('/auth/signin', AuthController::class, 'auth');
$router->get('/auth/signout', AuthController::class, 'logout');

$router->dispatch();
