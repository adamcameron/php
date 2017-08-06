<?php

namespace me\adamcameron\kahlan\service;

class Dependency
{
	public function first(string $arg) : string
	{
		//throw new \Exception('first was not mocked');
		return "first: $arg";
	}

	public function second(string $arg) : string
	{
		//throw new \Exception('second was not mocked');
		return "second: $arg";
	}
}