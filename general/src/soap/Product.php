<?php

namespace me\adamcameron\geneal\soap;

class Product {

	public $id;
	public $description;
	public $rrp;
		
	function __construct(int $id, $description, float $rrp){
		$this->id = $id;
		$this->description = $description;
		$this->rrp = $rrp;
	}
	
	static function createFromXml($xml){
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;
		$obj = new Product(
			(int)$sxe->id,
			(string)$sxe->description,
			(float)$sxe->rrp
		);
		return $obj;			
	}
}
