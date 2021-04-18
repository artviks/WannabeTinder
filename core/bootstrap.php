<?php


use League\Container\Container;
use WTinder\Controllers\ImageController;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Controllers\SignInUsersController;
use WTinder\Repositories\Database\Connection;
use WTinder\Repositories\Database\MySQLUsersRepository;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Services\Images\UploadImageService;
use WTinder\Services\Users\GetUsersService;
use WTinder\Services\Users\RegisterUsersService;
use WTinder\Services\Users\SingInUsersService;


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
$container->add(SingInUsersService::class,SingInUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);
$container->add(GetUsersService::class, GetUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);
$container->add(UploadImageService::class, UploadImageService::class);

// controllers
$container->add(PagesController::class, PagesController::class)
    ->addArgument(GetUsersService::class);
$container->add(RegisterUsersController::class, RegisterUsersController::class)
    ->addArgument(RegisterUsersService::class);
$container->add(SignInUsersController::class, SignInUsersController::class)
    ->addArgument(SingInUsersService::class);
$container->add(ImageController::class, ImageController::class)
    ->addArgument(UploadImageService::class);



return $container;