<?php

namespace doctrineTest\model;

class Product {

	protected $id;
	protected $name;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
}