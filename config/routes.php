<?php

use App\lib\Route;
use App\src\controllers\PostController;
use App\src\controllers\WelcomeController;
use App\src\middlewares\RequestMiddleware;

return [
    Route::get('/virtara-task/test')->controller(WelcomeController::class)->action('Test')->middleware(RequestMiddleware::class)->init(),
    Route::get('/virtara-task/test/{id}')->controller(WelcomeController::class)->action('Test')->middleware(RequestMiddleware::class)->init(),

    Route::get('/virtara-task/posts')->controller(PostController::class)->action('index')->middleware(RequestMiddleware::class)->init(),
    Route::get('/virtara-task/posts/{id}')->controller(PostController::class)->action('show')->middleware(RequestMiddleware::class)->init(),
    Route::post('/virtara-task/posts')->controller(PostController::class)->action('store')->middleware(RequestMiddleware::class)->init(),

];