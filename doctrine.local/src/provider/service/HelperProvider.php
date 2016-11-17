<?php

namespace doctrineTest\provider\service;

use doctrineTest\helper\ParameterHelper;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class HelperProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["helper.parameter"] = function(){
			$parameterHelper = new ParameterHelper();

			return $parameterHelper;
		};
	}
}
