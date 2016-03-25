<?php

namespace me\adamcameron\decorator\service\user;

use me\adamcameron\decorator\repository\RepositoryInterface;

class UserService {

	private $userRepository;

	public function __construct(RepositoryInterface $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function getById($id) {
		return $this->userRepository->getById($id);
	}
}
