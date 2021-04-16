<?php


use League\Container\Container;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Repositories\Database\Connection;
use WTinder\Repositories\Database\MySQLUsersRepository;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Services\Users\RegisterUsersService;


$config = require '../config.php';


$container = new Container();

//config
$container->add('pdo', Connection::make($config['database']));

//repositories
$container->add(UsersRepositoryInterface::class, MySQLUsersRepository::class)
    ->addArgument('pdo');

//services
$container->add(RegisterUsersService::class, RegisterUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);

// controllers
$container->add(PagesController::class, PagesController::class);
$container->add(RegisterUsersController::class, RegisterUsersController::class)
    ->addArgument(RegisterUsersService::class);


return $container;