<?php

use WTinder\FastRouter;

require "../vendor/autoload.php";


session_start();

$routes = require '../core/routes.php';
$container = require '../core/bootstrap.php';

FastRouter::load($routes, $container);