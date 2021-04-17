<?php


use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Controllers\SignInUsersController;

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    // PagesController
    $r->addRoute('GET', '/', [PagesController::class, 'login']);
    $r->addRoute('GET', '/register', [PagesController::class, 'register']);

    //RegisterUsersController
    $r->addRoute('POST', '/register', [RegisterUsersController::class, 'register']);

    //SignInUsersController
    $r->addRoute('POST', '/singIn', [SignInUsersController::class, 'singIn']);
});