<?php

namespace me\adamcameron\accounts;

class Invoice {

	public $id;
	public $account;
	public $items;

	function __construct(int $id, Account $account, array $items){
		$this->id = $id;
		$this->account = $account;
		$this->items = $items;
	}

	static function createFromXml($xml) {
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;
		$obj = new Invoice(
			(int)$sxe->id,
			Account::createFromXml($sxe->account),
			self::createInvoiceLinesFromXml($sxe->items)
		);
		return $obj;
	}

	static function createInvoiceLinesFromXml($xml) {
		$sxe = is_string($xml) ? new \SimpleXMLElement($xml) : $xml;
		$items = ((array) $sxe)['items'];
		return array_map(function($line){
			return InvoiceLine::createFromXml($line);
		}, $items);
	}
}
