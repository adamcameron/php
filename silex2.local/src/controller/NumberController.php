<?php

namespace me\adamcameron\silex2\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @codeCoverageIgnore */
class NumberController
{

    public function doGetByIdAndLanguage(Request $request)
    {
        $number = (object) [
            'id' => $request->get('id'),
            'lang' => $request->get('lang'),
            'number' => 'PLACEHOLDER'
        ];
        return new JsonResponse($number, Response::HTTP_OK);
    }
}
