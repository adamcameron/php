<?php
// Home.php
namespace me\adamcameron\behattest\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Home {

	public static function doGet(Request $request, Application $app){
		return $app['twig']->render('home.html.twig', ['greeting' => 'G\'day world']);
	}

	public static function doGetInfo(Request $request, Application $app){
        ob_start();
        phpinfo();
        $info = ob_get_contents();
        ob_get_clean();
		return $app['twig']->render('info.html.twig', ['info' => $info]);
	}

}
