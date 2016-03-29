<?php

namespace me\adamcameron\decorator\provider\service;

use me\adamcameron\decorator\repository\CachedLoggedUserRepository;
use me\adamcameron\decorator\repository\CachedRepository;
use me\adamcameron\decorator\repository\LoggedRepository;
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
	}

}
