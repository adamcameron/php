<?php

namespace me\adamcameron\silex2\controller;

use Symfony\Component\HttpFoundation\Response;

/** @codeCoverageIgnore */
class HomeController
{

    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function doGet()
    {
        $content = $this->twig->render(
            'home.twig',
            ['message' => 'This is the Home Page']
        );

        return new Response($content, Response::HTTP_OK);
    }
}
