<?php


namespace App\Controllers;


use Twig\Environment;

class PagesController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function login(): void
    {
        $this->twig->display('loginPage.twig');
    }

    public function register(): void
    {
        $this->twig->display('register.twig');
    }
}