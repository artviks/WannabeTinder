<?php


use League\Container\Container;
use WTinder\Controllers\AppController;
use WTinder\Controllers\ImageController;
use WTinder\Controllers\PagesController;
use WTinder\Controllers\RegisterUsersController;
use WTinder\Controllers\SignInUsersController;
use WTinder\Repositories\Database\Connection;
use WTinder\Repositories\Database\MySQLImageDataRepository;
use WTinder\Repositories\Database\MySQLUsersLikesRepository;
use WTinder\Repositories\Database\MySQLUsersImagesRepository;
use WTinder\Repositories\Database\MySQLUsersRepository;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersLikesRepositoryInterface;
use WTinder\Repositories\UsersImagesRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Services\Images\UploadImageService;
use WTinder\Services\Profiles\GetProfileService;
use WTinder\Services\Profiles\GetOppositeProfileService;
use WTinder\Services\Users\FindUsersMatchService;
use WTinder\Services\Users\RegisterUsersService;
use WTinder\Services\Users\SaveUsersChoicesService;
use WTinder\Services\Users\SignInUsersService;


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

$container->add(UsersLikesRepositoryInterface::class, MySQLUsersLikesRepository::class)
    ->addArgument('pdo');


//services
$container->add(RegisterUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);

$container->add(SignInUsersService::class)
    ->addArgument(UsersRepositoryInterface::class);

$container->add(GetProfileService::class)
    ->addArguments([
        UsersRepositoryInterface::class,
        ImageDataRepositoryInterface::class,
    ]);

$container->add(UploadImageService::class)
    ->addArguments([ImageDataRepositoryInterface::class, UsersImagesRepositoryInterface::class]);

$container->add(GetOppositeProfileService::class)
    ->addArguments([
        UsersRepositoryInterface::class,
        ImageDataRepositoryInterface::class
    ]);

$container->add(SaveUsersChoicesService::class)
    ->addArguments([
        UsersLikesRepositoryInterface::class,
        UsersRepositoryInterface::class
    ]);

$container->add(FindUsersMatchService::class)
    ->addArguments([
        UsersLikesRepositoryInterface::class,
        UsersRepositoryInterface::class,
        GetProfileService::class
    ]);


// controllers
$container->add(PagesController::class)
    ->addArguments([
        GetProfileService::class,
        FindUsersMatchService::class
    ]);

$container->add(RegisterUsersController::class)
    ->addArgument(RegisterUsersService::class);

$container->add(SignInUsersController::class)
    ->addArgument(SignInUsersService::class);

$container->add(ImageController::class)
    ->addArgument(UploadImageService::class);

$container->add(AppController::class)
    ->addArguments([
        GetOppositeProfileService::class,
        SaveUsersChoicesService::class
    ]);



return $container;