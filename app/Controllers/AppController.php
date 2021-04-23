<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetOppositeProfileService;
use WTinder\Services\Users\SaveUsersChoicesService;
use WTinder\Services\Users\UserChoiceRequest;

class AppController extends Controller
{
    private GetOppositeProfileService $service;
    private SaveUsersChoicesService $choicesService;

    public function __construct(GetOppositeProfileService $service, SaveUsersChoicesService $choicesService)
    {
        parent::__construct();
        $this->service = $service;
        $this->choicesService = $choicesService;
    }

    public function show(): void
    {
        $this->render('app.twig', [
            'profile' => $this->service->execute($_SESSION['auth_email'])
        ]);
    }

    public function saveChoice(): void
    {
        $this->choicesService->execute(
            new UserChoiceRequest(
                $_SESSION['auth_email'],
                $_POST['user'],
                $_POST['choice']
            )
        );

        $this->redirect('/app');
    }

    public function matches(): void
    {

    }
}