<?php


namespace WTinder\Controllers;

use WTinder\Services\Users\RegisterUsersRequest;
use WTinder\Services\Users\RegisterUsersService;


class RegisterUsersController
{
    private RegisterUsersService $service;

    public function __construct(RegisterUsersService $service)
    {
        $this->service = $service;
    }

    public function register(): void
    {
        $this->service->execute(
            new RegisterUsersRequest(
                $_POST['name'],
                $_POST['surname'],
                $_POST['email'],
                $_POST['password'],
            )
        );
    }
}