<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetOppositeProfileService;
use WTinder\Services\Users\FindUsersMatchService;
use WTinder\Services\Users\SaveUsersChoicesService;
use WTinder\Services\Users\UserChoiceRequest;

class AppController extends Controller
{
    private GetOppositeProfileService $service;
    private SaveUsersChoicesService $choicesService;
    private FindUsersMatchService $matchService;

    public function __construct
    (
        GetOppositeProfileService $service,
        SaveUsersChoicesService $choicesService,
        FindUsersMatchService $matchService
    )
    {
        parent::__construct();
        $this->service = $service;
        $this->choicesService = $choicesService;
        $this->matchService = $matchService;
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
        var_dump($this->matchService->execute($_SESSION['auth_email']));
    }
}