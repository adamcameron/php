<?php

require __DIR__ . '/dependencies.php';

class UserRepository {

	private $dataSource;

	public function __construct($dataSource) {
		$this->dataSource = $dataSource;
	}

	public function getById($id) {
		$userAsJson = $this->dataSource->getById($id);

		$rawUser = json_decode($userAsJson);
		$user = new User($rawUser->id, $rawUser->firstName, $rawUser->lastName);

		return $user;
	}

	public function getByFilters($filters) {
		$usersAsJson = $this->dataSource->getByFilters($filters);

		$rawUsers = json_decode($usersAsJson);
		$users = array_map(function($rawUser){
			return new User($rawUser->id, $rawUser->firstName, $rawUser->lastName);
		}, $rawUsers);

		return $users;
	}

	public function create($firstName, $lastName){
		$rawNewUser = json_decode($this->dataSource->create($firstName, $lastName));
		return new User($rawNewUser->id, $rawNewUser->firstName, $rawNewUser->lastName);
	}
}

class LoggedUserRepository {

	private $repository;
	private $loggerService;

	public function __construct($repository, $loggerService) {
		$this->repository = $repository;
		$this->loggerService = $loggerService;
	}

	public function getById($id) {
		$this->loggerService->logText("$id requested");
		$object = $this->repository->getById($id);

		return $object;
	}

	public function getByFilters($filters) {
		return $this->repository->getByFilters($filters);
	}

	public function create($firstName, $lastName) {
		return $this->repository->create($firstName, $lastName);
	}

}

$dataSource = new DataSource();
$userRepository = new UserRepository($dataSource);

$loggerService = new LoggerService();
$loggedUserRepository = new LoggedUserRepository($userRepository, $loggerService);

$user = $loggedUserRepository->getById(5);
var_dump($user);

$users = $loggedUserRepository->getByFilters(['firstName'=>'Zachary', 'lastName'=>'Cameron Lynch']);
var_dump($users);

$newUser = $loggedUserRepository->create('Zachary', 'Cameron Lynch');
var_dump($newUser);