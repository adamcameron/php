<?php

namespace me\adamcameron\geneal\soap;

class InvoiceLine {

	public $id;
	public $product;
	public $count;
	public $price;
		
	function __construct(int $id, Product $product, int $count, float $price){
		$this->id = $id;
		$this->product = $product;
		$this->count = $count;
		$this->price = $price;
	}
	
	static function createFromXml ($xml){
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;
		$obj = new InvoiceLine(
			(int)$sxe->id,
			Product::createFromXml($sxe->product),
			(int)$sxe->count,
			(float)$sxe->price
		);
		return $obj;			
	}
}
