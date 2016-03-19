<?php
namespace me\adamcameron\decorator\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiRoleRepositoryExampleController {

	public static function doGet(Request $request, Application $app){

		echo "First Fetch:<br>";
		$user = $app["service.userWithMultiRoleRepository"]->getById(5);
		echo "<pre>";
		var_dump($user);
		echo "</pre>";

		sleep(1);

		echo "Second Fetch:<br>";
		$user = $app["service.userWithMultiRoleRepository"]->getById(5);
		echo "<pre>";
		var_dump($user);
		echo "</pre>";

		return new Response("");
	}

}
