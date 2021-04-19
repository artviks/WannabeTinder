<?php


use League\Container\Container;
use WTinder\Controllers\ImageController;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Controllers\SignInUsersController;
use WTinder\Repositories\Database\Connection;
use WTinder\Repositories\Database\MySQLImageDataRepository;
use WTinder\Repositories\Database\MySQLUsersImagesRepository;
use WTinder\Repositories\Database\MySQLUsersRepository;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersImagesRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Services\Images\UploadImageService;
use WTinder\Services\Profiles\GetProfileService;
use WTinder\Services\Users\RegisterUsersService;
use WTinder\Services\Users\SingInUsersService;


$config = require '../config.php';


$container = new Container();

//config
$container->add('pdo', Connection::make($config['database']));

//repositories
$container->add(UsersRepositoryInterface::class, MySQLUsersRepository::class)
    ->addArgument('pdo');

$container->add(ImageDataRepositoryInterface::class, MySQLImageDataRepository::class)
    ->addArgument('pdo');

$container->add(UsersImagesRepositoryInterface::class, MySQLUsersImagesRepository::class)
    ->addArgument('pdo');

//services
$container->add(RegisterUsersService::class, RegisterUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);

$container->add(SingInUsersService::class,SingInUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);

$container->add(GetProfileService::class, GetProfileService::class)
    ->addArguments([UsersRepositoryInterface::class, ImageDataRepositoryInterface::class, UsersImagesRepositoryInterface::class]);

$container->add(UploadImageService::class, UploadImageService::class)
    ->addArguments([ImageDataRepositoryInterface::class, UsersImagesRepositoryInterface::class]);

// controllers
$container->add(PagesController::class, PagesController::class)
    ->addArgument(GetProfileService::class);

$container->add(RegisterUsersController::class, RegisterUsersController::class)
    ->addArgument(RegisterUsersService::class);

$container->add(SignInUsersController::class, SignInUsersController::class)
    ->addArgument(SingInUsersService::class);

$container->add(ImageController::class, ImageController::class)
    ->addArgument(UploadImageService::class);



return $container;