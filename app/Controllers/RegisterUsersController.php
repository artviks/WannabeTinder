<?php


namespace App\Controllers;


use App\Models\User;
use Twig\Environment;

class RegisterUsersController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function register(): void
    {
        $user = new User(
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['password']
        );

        var_dump($user);
    }
}