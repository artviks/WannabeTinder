<?php


use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    // PagesController
    $r->addRoute('GET', '/', [PagesController::class, 'login']);
    $r->addRoute('GET', '/register', [PagesController::class, 'register']);

    $r->addRoute('POST', '/register', [RegisterUsersController::class, 'register']);
});