<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class LoggedUserRepository implements RepositoryInterface {

	private $loggerService;

	public function __construct(RepositoryInterface $repository, LoggerServiceInterface $loggerService){
		$this->loggerService = $loggerService;
	}

	public function getById($id)
	{
		$this->loggerService->logText("$id requested");
		return (object) [
			"id" => $id,
			"firstName" => "Number $id",
			"recordAccessed" => new \DateTime()
		];
	}

}
