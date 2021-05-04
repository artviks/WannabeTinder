<?php


use WTinder\Controllers\PagesController;
use WTinder\Middlewares\AuthMiddleware;
use WTinder\Middlewares\SignInMiddleware;

return [
    PagesController::class . '@profile' => [
        AuthMiddleware::class
    ],
    PagesController::class . '@matches' => [
        AuthMiddleware::class
    ],
    PagesController::class . '@app' => [
        AuthMiddleware::class
    ],
    PagesController::class . '@singIn' => [
        SignInMiddleware::class
    ]
];