<?php

namespace doctrineTest\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ColourController {

	public static function doGet(Request $request, Application $app) {
		$id = $request->get("id");
		$colour = $app["repository.colour"]->getById($id);

		return $app["twig"]->render("colour.html.twig", ["colour"=>$colour]);
	}
}