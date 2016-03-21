<?php

namespace me\adamcameron\decorator\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {

	public static function doGet(Request $request, Application $app){
		return "G'day World";
	}

}
