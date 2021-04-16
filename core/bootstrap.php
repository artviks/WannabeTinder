<?php


use League\Container\Container;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Services\Users\RegisterUsersService;


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
$container->add(RegisterUsersService::class, RegisterUsersService::class)
    ->addArgument(RegisterUsersService::class);

// controllers
$container->add(PagesController::class, PagesController::class)
    ->addArgument('twig');
$container->add(RegisterUsersController::class, RegisterUsersController::class)
    ->addArgument(RegisterUsersService::class);


return $container;