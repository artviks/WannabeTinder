<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetProfileService;

class PagesController extends Controller
{
    private GetProfileService $service;

    public function __construct(GetProfileService $service)
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

        $profile = $this->service->execute($_SESSION['auth_email']);

        $this->render('profile.twig', [
            'profile' => $profile
        ]);

    }

    public function singOut(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}