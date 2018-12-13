<?php
namespace me\adamcameron\asyncguzzle\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController {

	public function doGet(){
		return new JsonResponse(['status'=>Response::HTTP_OK]);
	}

}
