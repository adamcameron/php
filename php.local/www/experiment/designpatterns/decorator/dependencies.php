<?php

class User {

	public $id;
	public $firstName;
	public $lastName;

	function __construct($id, $firstName, $lastName){
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

}

class DataSource {

	function getById($id){
		return json_encode([
			'id' => $id,
			'firstName' => 'Zachary',
			'lastName' => 'Cameron Lynch'
		]);
	}

	function getByFilters($filters) {
		$users = [];
		$id = 0;
		foreach($filters as $filterColumn=>$filterValue){
			$users[] = [
				'id' => ++$id,
				'firstName' => $filterColumn,
				'lastName' => $filterValue
			];
		}
		return json_encode($users);
	}

	function create($firstName, $lastName) {
		return json_encode([
			'id' => 1,
			'firstName' => $firstName,
			'lastName' => $lastName
		]);
	}
}

class LoggerService {

	function logText($text){
		echo "LOGGED: $text" . PHP_EOL;
	}
}
