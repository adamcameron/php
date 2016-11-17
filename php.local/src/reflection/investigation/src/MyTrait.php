<?php

namespace me\adamcameron\reflection\investigation;

trait MyTrait {
	
	public function myTraitMethod($myArg){
		return (array) $this->myMethod($myArg);
	}
	
	abstract public function myMethod(string $myArg);
}
