<?php


namespace WTinder\Controllers;


use WTinder\Services\Profiles\GetOppositeProfileService;
use WTinder\Services\Users\FindUsersMatchService;
use WTinder\Services\Users\SaveUsersChoicesService;
use WTinder\Services\Users\UserChoiceRequest;

class AppController extends Controller
{
    private SaveUsersChoicesService $choicesService;

    public function __construct
    (
        SaveUsersChoicesService $choicesService
    )
    {
        parent::__construct();
        $this->choicesService = $choicesService;
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
}