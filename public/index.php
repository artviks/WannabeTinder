<?php

use WTinder\FastRouter;

require "../vendor/autoload.php";


session_start();

$routes = require '../core/routes.php';
$container = require '../core/container.php';
$middlewares = require '../core/middlewares.php';

FastRouter::load($routes, $container, $middlewares);