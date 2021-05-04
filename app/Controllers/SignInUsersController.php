<?php


namespace WTinder\Controllers;


use WTinder\Services\Users\SingInUsersRequest;
use WTinder\Services\Users\SignInUsersService;

class SignInUsersController extends Controller
{
    private SignInUsersService $service;

    public function __construct(SignInUsersService $service)
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

    public function singOut(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}