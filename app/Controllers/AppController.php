<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetOppositeProfilesService;

class AppController extends Controller
{
    private GetOppositeProfilesService $service;

    public function __construct(GetOppositeProfilesService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function showImages(): void
    {
        $this->render('app.twig', [
            'profiles' => $this->service->execute($_SESSION['auth_email'])->getCollection()
        ]);
    }
}