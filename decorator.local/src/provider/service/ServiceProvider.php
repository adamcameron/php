<?php

namespace me\adamcameron\decorator\provider\service;

use me\adamcameron\decorator\service\cache\BasicCacheService;
use me\adamcameron\decorator\service\cache\NullCacheService;
use me\adamcameron\decorator\service\logger\BasicLoggerService;
use me\adamcameron\decorator\service\logger\NullLoggerService;
use me\adamcameron\decorator\service\user\UserService;
use Silex;

class ServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {

		$app["service.userWithMultiRoleRepository"] = $app->share(function($app) {
			return new UserService($app["repository.cachedLoggedUser"]);
		});

		$app["service.userWithNullifiedMultiRoleRepository"] = $app->share(function($app) {
			return new UserService($app["repository.nullifiedCachedLoggedUser"]);
		});

		$app["service.user"] = $app->share(function($app) {
			return new UserService($app["repository.user"]);
		});

		$app["service.userWithFullyDecoratedRepository"] = $app->share(function($app) {
			return new UserService($app["repository.cachedLoggedUser"]);
		});

		$app["service.userWithReverseDecoratedRepository"] = $app->share(function($app) {
			return new UserService($app["repository.loggedCachedUser"]);
		});

		$app["service.userWithLoggerDecoratedRepository"] = $app->share(function($app) {
			return new UserService($app["repository.loggedUser"]);
		});

		$app["service.userWithCacheDecoratedRepository"] = $app->share(function($app) {
			return new UserService($app["repository.cachedUser"]);
		});

		$app["service.basicLogger"] = $app->share(function() {
			return new BasicLoggerService();
		});

		$app["service.nullLogger"] = $app->share(function() {
			return new NullLoggerService();
		});

		$app["service.basicCache"] = $app->share(function() {
			return new BasicCacheService();
		});

		$app["service.nullCache"] = $app->share(function() {
			return new NullCacheService();
		});
	}

}
