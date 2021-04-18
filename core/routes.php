<?php


use WTinder\Controllers\ImageController;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Controllers\SignInUsersController;

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    // PagesController
    $r->addRoute('GET', '/', [PagesController::class, 'singIn']);
    $r->addRoute('GET', '/register', [PagesController::class, 'register']);
    $r->addRoute('GET', '/profile', [PagesController::class, 'profile']);

    //RegisterUsersController
    $r->addRoute('POST', '/register', [RegisterUsersController::class, 'register']);

    //SignInUsersController
    $r->addRoute('POST', '/singIn', [SignInUsersController::class, 'singIn']);

    //ImagesController
    $r->addRoute('POST', '/upload', [ImageController::class, 'upload']);
});