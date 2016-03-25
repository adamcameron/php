<?php

namespace me\adamcameron\decorator\repository;

class UserRepository implements RepositoryInterface {

	public function getById($id) {
		return (object) [
			"id" => $id,
			"firstName" => "Number $id",
			"recordAccessed" => new \DateTime()
		];
	}

}
