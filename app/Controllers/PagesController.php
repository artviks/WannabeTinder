<?php


namespace WTinder\Controllers;


use WTinder\Services\Users\GetUsersService;

class PagesController extends Controller
{
    private GetUsersService $service;

    public function __construct(GetUsersService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function singIn(): void
    {
        if(isset($_SESSION['auth_email'])) {
            $this->redirect('profile');
        }

        $this->render('singIn.twig');
    }

    public function register(): void
    {
        $this->render('register.twig');
    }

    public function profile(): void
    {
        $user = $this->service->execute($_SESSION['auth_email']);
        $this->render('profile.twig', [
            'user' => $user
        ]);
    }

    public function singOut(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}