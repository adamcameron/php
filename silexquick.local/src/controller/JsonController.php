<?php

namespace silexquick\controller;

use silexquick\app\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonController {

    public function doGet(Request $request, Application $app, $version){

        switch ($version){
            case 'silex':
                return $app->json(['version'=>'Silex']);
            break;

            case 'symfony':
                return new JsonResponse(['version'=>'Symfony']);
            break;

            case 'silex_no_content':
                return $app->json(null, Response::HTTP_NO_CONTENT);
            break;

            case 'silex_empty':
                return $app->json(null);
            break;

            case 'empty_symfony':
                return new JsonResponse(null, Response::HTTP_NO_CONTENT);
                break;

            default:
                return new Response('', Response::HTTP_BAD_REQUEST);
        }

    }

}