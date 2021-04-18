<?php


namespace WTinder\Controllers;

use WTinder\Services\Users\RegisterUsersRequest;
use WTinder\Services\Users\RegisterUsersService;


class RegisterUsersController extends Controller
{
    private RegisterUsersService $service;

    public function __construct(RegisterUsersService $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    public function register(): void
    {
        try {
            $this->service->execute(
                new RegisterUsersRequest(
                    $_POST['name'],
                    $_POST['surname'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['gender']
                )
            );
        } catch (\InvalidArgumentException $e) {
            $this->render('errors.twig', ['message' => $e->getMessage()]);
        }

        $this->render('singIn.twig');
    }
}