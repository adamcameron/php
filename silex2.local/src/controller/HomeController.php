<?php

namespace me\adamcameron\silex2\controller;

use Symfony\Component\HttpFoundation\Response;

/** @codeCoverageIgnore */
class HomeController
{
    public function doGet()
    {
        return new Response('Home Page', Response::HTTP_OK);
    }
}
