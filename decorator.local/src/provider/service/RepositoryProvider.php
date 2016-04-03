<?php

namespace me\adamcameron\decorator\provider\service;

use me\adamcameron\decorator\repository\CachedLoggedPersonRepository;
use me\adamcameron\decorator\repository\CachedLoggedUserRepository;
use me\adamcameron\decorator\repository\CachedPersonRepository;
use me\adamcameron\decorator\repository\CachedRepository;
use me\adamcameron\decorator\repository\LoggedCachedPersonRepository;
use me\adamcameron\decorator\repository\LoggedPersonRepository;
use me\adamcameron\decorator\repository\LoggedRepository;
use me\adamcameron\decorator\repository\PersonRepository;
use me\adamcameron\decorator\repository\UserRepository;
use Silex;

class RepositoryProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {

		$app["repository.cachedLoggedUser"] = $app->share(function($app) {
			return new CachedLoggedUserRepository($app["service.basicLogger"], $app["service.basicCache"]);
		});

		$app["repository.nullifiedCachedLoggedUser"] = $app->share(function($app) {
			return new CachedLoggedUserRepository($app["service.nullLogger"], $app["service.nullCache"]);
		});

		$app["repository.user"] = $app->share(function() {
			return new UserRepository();
		});

		$app["repository.cachedUser"] = $app->share(function($app) {
			return new CachedRepository($app["repository.user"], $app["service.basicCache"]);
		});

		$app["repository.loggedUser"] = $app->share(function($app) {
			return new LoggedRepository($app["repository.user"], $app["service.basicLogger"]);
		});

		$app["repository.loggedCachedUser"] = $app->share(function($app) {
			return new LoggedRepository($app["repository.cachedUser"], $app["service.basicLogger"]);
		});

		$app["repository.cachedLoggedUser"] = $app->share(function($app) {
			return new CachedRepository($app["repository.loggedUser"], $app["service.basicCache"]);
		});

		$app["repository.inheritance.person"] = $app->share(function() {
			return new PersonRepository();
		});

		$app["repository.inheritance.cachedPerson"] = $app->share(function($app) {
			return new CachedPersonRepository($app["service.nullCache"]);
		});

		$app["repository.inheritance.loggedPerson"] = $app->share(function($app) {
			return new LoggedPersonRepository($app["service.basicLogger"]);
		});

		$app["repository.inheritance.loggedCachedPerson"] = $app->share(function($app) {
			return new LoggedCachedPersonRepository($app["service.basicCache"], $app["service.basicLogger"]);
		});

		$app["repository.inheritance.cachedLoggedPerson"] = $app->share(function($app) {
			return new CachedLoggedPersonRepository($app["service.basicLogger"], $app["service.basicCache"]);
		});
	}

}
