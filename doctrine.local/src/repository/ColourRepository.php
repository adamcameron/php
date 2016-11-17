<?php

namespace doctrineTest\repository;

class ColourRepository {

	private $entityManager;

	function __construct($entityManager) {
		$this->entityManager = $entityManager;
	}

	function getById($id){
		$colour = $this->entityManager->find('\doctrineTest\model\Colour', $id);

		return $colour;
	}
}