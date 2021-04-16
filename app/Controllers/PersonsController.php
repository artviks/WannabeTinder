<?php


namespace App\Controllers;


use App\Services\RegisterPersonsService;

class PersonsController
{

    private RegisterPersonsService $service;

    public function __construct(RegisterPersonsService $service)
    {
        $this->service = $service;
    }

    public function register(): void
    {
        var_dump($_POST); die();
        $this->service->register();
    }
}