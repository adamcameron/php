<?php

namespace doctrineTest\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HelloController {

	public static function doGet(Request $request, Application $app){
		$name = $request->get("name");
		return $app["twig"]->render("hello.html.twig", ["name"=>$name]);
	}
}
