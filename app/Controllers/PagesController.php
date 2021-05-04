<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetOppositeProfileService;
use WTinder\Services\Profiles\GetProfileService;
use WTinder\Services\Users\FindUsersMatchService;

class PagesController extends Controller
{
    private GetProfileService $service;
    private FindUsersMatchService $matchService;
    private GetOppositeProfileService $oppositeProfileService;

    public function __construct(
        GetProfileService $service,
        GetOppositeProfileService $oppositeProfileService,
        FindUsersMatchService $matchService)
    {
        parent::__construct();
        $this->service = $service;
        $this->matchService = $matchService;
        $this->oppositeProfileService = $oppositeProfileService;
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

    public function matches(): void
    {
        $this->render('match.twig', [
            'profiles' => $this->matchService->execute($_SESSION['auth_email'])->getCollection()
        ]);
    }

    public function app(): void
    {
        try {
            $this->render('app.twig', [
                'profile' => $this->oppositeProfileService->execute($_SESSION['auth_email'])
            ]);
        } catch (\OutOfBoundsException $e) {
            $this->render('errors.twig', [
                'message' => $e->getMessage()
            ]);
        }
    }
}