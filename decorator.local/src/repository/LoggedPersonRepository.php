<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class LoggedPersonRepository extends PersonRepository {

	protected $loggerService;

	public function __construct(LoggerServiceInterface $loggerService) {
		$this->loggerService = $loggerService;
	}

	public function getById($id) {
		$this->loggerService->logText("$id requested");
		$object = parent::getById($id);

		return $object;
	}

}
