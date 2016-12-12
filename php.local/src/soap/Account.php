<?php

namespace me\adamcameron\accounts;

class Account {

	public $id;
	public $firstName;
	public $lastName;
	public $dateOfBirth;
	public $address;

	function __construct(int $id, $firstName, $lastName, \DateTime $dateOfBirth, Address $address){
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->dateOfBirth = $dateOfBirth;
		$this->address = $address;
	}

	function getMailingAddress(){
		return sprintf("%s %s%s%s", $this->firstName, $this->lastName, PHP_EOL, $this->address->getMailingAddress());
	}

	static function createFromXml($xml) {
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;
		$obj = new Account(
			(int)$sxe->id,
			(string)$sxe->firstName,
			(string)$sxe->lastName,
			new \DateTime($sxe->dateOfBirth),
			Address::createFromXml($sxe->address)
		);
		return $obj;
	}
}
