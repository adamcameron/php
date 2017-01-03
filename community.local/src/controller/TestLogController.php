<?php

namespace community\controller;

use community\app\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestLogController {

    public function doGet(Request $request, Application $app) {

        $app["monolog"]->info("hi!");

        return new Response("All good", Response::HTTP_OK);
    }
}