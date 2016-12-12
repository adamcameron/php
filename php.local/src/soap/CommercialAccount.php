<?php

namespace me\adamcameron\accounts;

class CommercialAccount implements Account {

	public $id;
	public $companyName;
	public $address;
		
	function __construct(int $id, $companyName, Address $address){
		$this->id = $id;
		$this->companyName = $companyName;
		$this->address = $address;
	}
	
	function getMailingAddress(){
		return "${this.companyName}" . PHP_EOL . $this->address->getMailingAddress();
	}
}