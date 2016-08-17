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

}

$dataSource = new DataSource();
$userRepository = new UserRepository($dataSource);

$loggerService = new LoggerService();
$loggedUserRepository = new LoggedUserRepository($userRepository, $loggerService);

$user = $loggedUserRepository->getById(5);
var_dump($user);
