<?php

namespace me\adamcameron\kahlan\service;

class Service
{
	private $dependency;

	public function __construct($dependency)
	{
		$this->dependency = $dependency;
	}

	public function firstTest($arg)
	{
		$firstResult = $this->dependency->firstTestMethod1($arg);
		$secondResult = $this->dependency->firstTestMethod2($firstResult);

		return $secondResult;
	}

	public function secondTest($arg)
	{
		$this->dependency->secondTestMethod1($arg);
	}

	public function thirdTest($arg)
	{
		$this->dependency->thirdTestMethod1($arg);
	}
}