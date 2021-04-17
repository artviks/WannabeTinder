<?php


namespace WTinder\Controllers;


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