<?php

namespace me\adamcameron\kahlan\service;

class Service
{
	private $dependency;

	public function __construct($dependency)
	{
		$this->dependency = $dependency;
	}

	public function main($arg)
	{
		$firstResult = $this->dependency->first($arg);
//return $firstResult;
		$secondResult = $this->dependency->second($firstResult);

		return $secondResult;
	}
}