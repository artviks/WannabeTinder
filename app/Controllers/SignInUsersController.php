<?php


namespace WTinder\Controllers;


use WTinder\Services\Users\SingInUsersRequest;
use WTinder\Services\Users\SingInUsersService;

class SignInUsersController extends Controller
{
    private SingInUsersService $service;

    public function __construct(SingInUsersService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function singIn(): void
    {
        $this->service->execute(
            new SingInUsersRequest(
                $_POST['email'],
                $_POST['password']
            )
        );

        $errors = $this->service->getErrors();

        if (!empty($errors)) {
            $this->render('errors.twig', $errors);
            return;
        }

        $this->redirect('profile');
    }
}