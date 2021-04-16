<?php


namespace WTinder\Controllers;


use Twig\Environment;

class PagesController extends Controller
{
    public function login(): void
    {
        $this->render('login.twig');
    }

    public function register(): void
    {
        $this->render('register.twig');
    }

}