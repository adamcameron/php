<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class LoggedRepository implements RepositoryInterface {

	private $repository;
	private $loggerService;

	public function __construct(RepositoryInterface $repository, LoggerServiceInterface $loggerService){
		$this->repository = $repository;
		$this->loggerService = $loggerService;
	}

	public function getById($id)
	{
		$this->loggerService->logText("$id requested");
		$object = $this->repository->getById($id);

		return $object;
	}

}
