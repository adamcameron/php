<?php

namespace me\adamcameron\kahlan\service;

class Service
{
	private $dependency;

	public function __construct($dependency)
	{
		$this->dependency = $dependency;
	}

	public function callImplicitVoidMethod()
	{
		$this->dependency->isImplicitVoidMethod();
	}

	public function callExplicitVoidMethod()
	{
		$this->dependency->isExplicitVoidMethod();
	}
}
