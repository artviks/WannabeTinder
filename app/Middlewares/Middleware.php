<?php


namespace WTinder\Middlewares;


interface Middleware
{
    public function handle(): void;
}