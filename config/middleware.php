<?php

use App\src\middlewares\RequestMiddleware;
use App\src\middlewares\RouteMiddleware;

return [
    RouteMiddleware::class,
    RequestMiddleware::class,
];