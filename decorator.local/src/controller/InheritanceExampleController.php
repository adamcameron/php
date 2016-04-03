<?php

namespace me\adamcameron\decorator\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class InheritanceExampleController {

	public static function doGet(Request $request, Application $app) {
		ob_start();
		self::demonstrateRepository($app["repository.inheritance.person"], 5);
		echo "<hr>";

		self::demonstrateCachedRepository($app["repository.inheritance.cachedPerson"], 7);
		echo "<hr>";

		self::demonstrateRepository($app["repository.inheritance.loggedPerson"], 11);
		echo "<hr>";

		self::demonstrateCachedRepository($app["repository.inheritance.loggedCachedPerson"], 13);
		echo "<hr>";

		self::demonstrateCachedRepository($app["repository.inheritance.cachedLoggedPerson"], 17);
		echo "<hr>";

		$response = ob_get_clean();
		return $response;
	}

	private static function demonstrateRepository($repository, $idToGet){
		echo self::getClassName($repository) . ":<br>";
		$user = $repository->getById($idToGet);
		echo "<pre>";
		var_dump($user);
		echo "</pre>";
		return $user;
	}

	private static function demonstrateCachedRepository($cachedRepository, $idToGet){
		echo "First pass<br>";
		$user1 = self::demonstrateRepository($cachedRepository, $idToGet);

		sleep(1);

		echo "Second pass<br>";
		$user2 = self::demonstrateRepository($cachedRepository, $idToGet);

		assert($user1->recordAccessed == $user2->recordAccessed, new \Exception("Caching failed"));
	}

	private static function getClassName($object){
		$reflection = new \ReflectionClass($object);
		return $reflection->getShortName();
	}
}
