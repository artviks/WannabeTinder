<?php


namespace WTinder\Controllers;


use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Controller
{
    private Environment $twig;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('./../public/Views'), [
            'debug' => true]);
        $this->twig->addExtension(new DebugExtension);
    }

    public function render(string $view, array $vars = []): void
    {
        $this->twig->display($view, $vars);
    }
}