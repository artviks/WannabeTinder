<?php


namespace WTinder\Middlewares;


class SignInMiddleware implements Middleware
{
    public function handle(): void
    {
        if (isset($_SESSION['auth_email']))
        {
            header('Location: /profile');
        }
    }
}