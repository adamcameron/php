<?php

namespace me\adamcameron\general\testApp\repository;

use GuzzleHttp\Promise\Promise;
use me\adamcameron\general\testApp\adapter\Adapter;

class PersonRepository {

	private $adapter;
	private $baseUrl = "http://php.local/experiment/guzzle/";

	private static $getByIdUrl = "getById.php";
	private static $createUrl = "create.php";
	private static $updateUrl = "update.php";

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

	public function create($details) : Promise {
		$response = $this->adapter->post(
			$this->baseUrl . self::$createUrl,
			$details
		);

		return $response;
	}

	public function update($id, $details) : Promise {
		$response = $this->adapter->put(
			$this->baseUrl . self::$updateUrl,
			$details,
			["id" => $id]
		);

		return $response;
	}
}
