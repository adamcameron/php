<?php

namespace me\adamcameron\decorator\repository;

class LoggedUserRepository implements RepositoryInterface {

	private $loggerService;

	public function __construct(RepositoryInterface $repository, $loggerService){
		$this->loggerService = $loggerService;
	}

	public function getById($id)
	{
		$this->loggerService->logText("$id requested");
		return (object) [
			'id' => $id,
			'firstName' => 'Number $id',
			'recordAccessed' => new \DateTime()
		];
	}

}
