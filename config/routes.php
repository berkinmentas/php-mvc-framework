<?php

use App\lib\Route;
use App\src\controllers\WelcomeController;
use App\src\middlewares\RequestMiddleware;

return [
    Route::get('/virtara-task/test')->controller(WelcomeController::class)->action('Test')->middleware(RequestMiddleware::class)->init(),
    Route::get('/virtara-task/{id}')->controller(WelcomeController::class)->action('Test')->middleware(RequestMiddleware::class)->init(),
];