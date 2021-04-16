<?php

use App\Controllers\PagesController;
use App\Controllers\PersonsController;
use App\Repositories\Database\Connection;
use App\Repositories\Database\MySQLPersonsStorage;
use App\Repositories\PersonsStorageInterface;
use App\Services\RegisterPersonsService;
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
$container->add(PersonsStorageInterface::class, MySQLPersonsStorage::class)
    ->addArgument('pdo');

//services
$container->add(RegisterPersonsService::class, RegisterPersonsService::class)
    ->addArgument(PersonsStorageInterface::class);

// controllers
$container->add(PagesController::class, PagesController::class)
    ->addArgument('twig');
$container->add(PersonsController::class, PersonsController::class)
    ->addArgument(RegisterPersonsService::class);


return $container;