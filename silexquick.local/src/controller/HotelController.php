<?php

namespace silexquick\controller;

use silexquick\app\Application;
use Symfony\Component\HttpFoundation\Request;

class HotelController {

	public function doGet(Request $request, Application $app, $date){

		return sprintf("Date: %s (PHP version:  %s)", $date, phpversion());
	}

}