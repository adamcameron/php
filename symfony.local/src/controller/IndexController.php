<?php

namespace dac\s4\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function doGet(Request $request)
    {
        return new JsonResponse("G'day world", JsonResponse::HTTP_OK);
    }
}