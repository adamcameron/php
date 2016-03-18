<?php

namespace me\adamcameron\decorator\repository;

class CachedRepository implements RepositoryInterface {

	private $repository;
	private $cacheService;

	public function __construct(RepositoryInterface $repository, $cacheService){
		$this->repository = $repository;
		$this->cacheService = $cacheService;
	}

	public function getById($id)
	{
		if ($this->cacheService->isCached($id)) {
			return $this->cacheService->get($id);
		}
		$object = $this->repository->getById($id);

		$this->cacheService->put($id, $object);
		return $object;
	}

}
