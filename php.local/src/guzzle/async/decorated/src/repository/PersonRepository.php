<?php

namespace me\adamcameron\testApp\repository;

use GuzzleHttp\Promise\Promise;
use me\adamcameron\testApp\adapter\Adapter;

class PersonRepository {

	private $adapter;

	private static $baseUrl = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/";
	private static $getByIdUrl = "getById.cfm";
	private static $getByNameUrl = "getByName.cfm";
	private static $returnStatusCodeUrl = "returnStatusCode.cfm";

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
	}

	public function getById($id) : Promise {
		$response = $this->adapter->get(
			self::$baseUrl . self::$getByIdUrl,
			["id" => $id]
		);

		return $response;
	}

	public function getByName($firstName, $lastName) : Promise {
		$response = $this->adapter->get(
			self::$baseUrl . self::$getByNameUrl,
			[
				"firstName" => $firstName,
				"lastName" => $lastName
			]
		);

		return $response;
	}

	public function returnStatusCode($statusCode) : Promise {
		$response = $this->adapter->get(
			self::$baseUrl . self::$returnStatusCodeUrl,
			["statusCode" => $statusCode]
		);

		return $response;
	}
}
