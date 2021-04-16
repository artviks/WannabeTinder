<?php

use App\Controllers\PagesController;
use App\Controllers\RegisterUsersController;

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    //PersonsController
    $r->addRoute('GET', '/', [PagesController::class, 'login']);
    $r->addRoute('GET', '/register', [PagesController::class, 'register']);

    $r->addRoute('POST', '/r', [RegisterUsersController::class, 'register']);
});