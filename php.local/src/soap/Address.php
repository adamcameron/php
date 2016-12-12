<?php

namespace me\adamcameron\accounts;

class Address {

	public $id;
	public $localPart;
	public $country;
	public $postcode;
	
	function __construct(int $id, $localPart, $country, $postCode = "") {
		$this->id = $id;
		$this->localPart = $localPart;
		$this->country = $country;
		$this->postCode = $postCode;
	}
	
	function getMailingAddress(){
		return "${this.localPart}" . PHP_EOL
		. "${this.country}" . PHP_EOL
		. "${this.postcode}" . PHP_EOL;
	}
	
	static function createFromXml($xml){
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;

		$obj = new Address(
			(int)$sxe->id,
			(string)$sxe->localPart,
			(string)$sxe->country,
			(string)$sxe->postCode
		);
		return $obj;			
	}
}
