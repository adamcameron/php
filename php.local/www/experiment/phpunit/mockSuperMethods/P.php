<?php
// P.php

namespace mockSuperMethods;
class P extends GP {

	public function g(){
		return $this->f();
	}

}