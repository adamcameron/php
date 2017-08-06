<?php

namespace me\adamcameron\kahlan\service;

class Dependency
{
	public function firstTestMethod1(string $arg) : string
	{
		//throw new \Exception('firstTestMethod1 was not mocked');
		return "first: $arg";
	}

	public function firstTestMethod2(string $arg) : string
	{
		//throw new \Exception('firstTestMethod2 was not mocked');
		return "second: $arg";
	}

	public function secondTestMethod1(string $arg) : void
	{
		throw new \Exception("secondTestMethod1 with $arg was not mocked");
	}

	public function thirdTestMethod1(string $arg)
	{
		throw new \Exception("thirdTestMethod1 with $arg was not mocked");
	}
}