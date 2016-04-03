<?php

namespace me\adamcameron\decorator\repository;

class PersonRepository implements RepositoryInterface {

	public function getById($id) {
		return (object) [
			"id" => $id,
			"firstName" => "Number $id",
			"recordAccessed" => new \DateTime()
		];
	}

}
