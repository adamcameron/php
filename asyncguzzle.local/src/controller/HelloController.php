<?php
namespace me\adamcameron\asyncguzzle\controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController {

	public function doGet($name){
		return new Response("G'day $name");
	}
}
