<?php

namespace silexquick\app;

use silexquick\controllers\HotelController;

class Application extends \Silex\Application {


	function __construct() {
		parent::__construct();
		$this["debug"] = true;
		$this->mountControllers();
	}


	function mountControllers() {
		$this->get('/hotel/{date}', 'silexquick\controller\HotelController::doGet');
		$this->get('/json/{version}', 'silexquick\controller\JsonController::doGet');
	}

}