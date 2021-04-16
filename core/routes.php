<?php

use App\Controllers\PagesController;
use App\Controllers\PersonsController;


return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    // PagesController
    $r->addRoute('GET', '/', [PagesController::class, 'login']);
    $r->addRoute('GET', '/register', [PagesController::class, 'register']);

    // PersonsController
    $r->addRoute('POST', '/register', [PersonsController::class, 'register']);

});