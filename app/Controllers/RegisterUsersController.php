<?php


namespace App\Controllers;


use App\Models\User;

class RegisterUsersController
{
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