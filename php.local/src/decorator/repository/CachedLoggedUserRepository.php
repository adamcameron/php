<?php

namespace me\adamcameron\decorator\repository;

class LoggedUserRepository implements RepositoryInterface {

	private $loggerService;
	private $cacheService;

	public function __construct(RepositoryInterface $repository, $loggerService, $cacheService){
		$this->loggerService = $loggerService;
		$this->cacheService = $cacheService;
	}

	public function getById($id)
	{
		$this->loggerService->logText("$id requested");

		if ($this->cacheService->isCached($id)) {
			return $this->cacheService->get($id);
		}

		$user = [
			'id' => $id,
			'firstName' => 'Number $id',
			'recordAccessed' => new \DateTime()
		];

		$this->cacheService->put($id, $user);
		return $user;
	}

}
