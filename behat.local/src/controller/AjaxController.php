<?php

// AjaxController.php
namespace me\adamcameron\behattest\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController
{
    public static function doGet(Request $request, Application $app)
    {
        return $app['twig']->render('ajax/main.html.twig');
    }

    public static function doAjaxGet(Request $request, Application $app)
    {
        sleep(5);
        $message = 'This is content loaded via AJAX request';
        $response = ['result' => $message];

        return $app->json($response, Response::HTTP_OK);
    }
}
