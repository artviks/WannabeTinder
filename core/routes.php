<?php


use WTinder\Controllers\AppController;
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
    $r->addRoute('GET', '/match', [PagesController::class, 'matches']);
    $r->addRoute('GET', '/app', [PagesController::class, 'app']);

    //RegisterUsersController
    $r->addRoute('POST', '/register', [RegisterUsersController::class, 'register']);

    //SignInUsersController
    $r->addRoute('POST', '/singIn', [SignInUsersController::class, 'singIn']);
    $r->addRoute('GET', '/singOut', [SignInUsersController::class, 'singOut']);

    //ImagesController
    $r->addRoute('POST', '/upload', [ImageController::class, 'upload']);

    //AppController
    $r->addRoute('POST', '/app', [AppController::class, 'saveChoice']);

});