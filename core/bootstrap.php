<?php

use App\Controllers\PagesController;
use App\Controllers\RegisterUsersController;
use App\Repositories\Database\Connection;
use League\Container\Container;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;


$config = require '../config.php';

//twig setup
$twig = new Environment(new FilesystemLoader('./../public/Views'), [
    'debug' => true
]);
$twig->addExtension(new DebugExtension);


$container = new Container();

$container->add('twig', $twig);

//config
$container->add('pdo', Connection::make($config['database']));

//repositories


//services


// controllers
$container->add(PagesController::class, PagesController::class)
    ->addArgument('twig');
$container->add(RegisterUsersController::class, RegisterUsersController::class);


return $container;