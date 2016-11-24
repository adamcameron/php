<?php

namespace me\adamcameron\testApp\repository;

use GuzzleHttp\Promise\Promise;
use me\adamcameron\testApp\adapter\Adapter;

class PersonRepository {

	private $adapter;
	private $baseUrl = "http://php.local/experiment/guzzle/";

	private static $getByIdUrl = "getById.php";
	private static $createUrl = "create.php";

	public function __construct(Adapter $adapter, $baseUrl)
	{
		$this->adapter = $adapter;
		$this->baseUrl = $baseUrl;
	}

	public function getById($id) : Promise {
		$response = $this->adapter->get(
			$this->baseUrl . self::$getByIdUrl,
			["id" => $id]
		);

		return $response;
	}

	public function returnStatusCode($statusCode) : Promise {
		$response = $this->adapter->get(
			$this->baseUrl . self::$returnStatusCodeUrl,
			["statusCode" => $statusCode]
		);

		return $response;
	}
}
