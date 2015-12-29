<?php
// Ajax.php
namespace me\adamcameron\behattest\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Ajax {

	public static function doGet(Request $request, Application $app){
		return $app['twig']->render('ajax/main.html.twig');
	}

}
