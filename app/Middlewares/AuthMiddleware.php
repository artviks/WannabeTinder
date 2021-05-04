<?php


namespace WTinder\Middlewares;


class AuthMiddleware implements Middleware
{
    public function handle(): void
    {
        if (! isset($_SESSION['auth_email']))
        {
            header('Location: /');
        }
    }
}