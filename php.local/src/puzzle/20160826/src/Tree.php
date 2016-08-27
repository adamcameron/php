<?php

namespace puzzle;

class Tree implements \JsonSerializable {

	public $parents = [];

	function __construct() {
		$tree = [
			"children" => []
		];
		$this->parents[0] = $tree;
	}

	function addNode($nodeText, $id, $parent) {
		$treeNode = [
			"nodeText" => $nodeText
		];
		$parent = $parent === "" ? 0 : $parent;
		$this->parents[$id] = &$treeNode;
		$this->parents[$parent]["children"][] = &$treeNode;
	}

	static function loadFromCsv($filePath) {
		$dataFile = fopen($filePath, "r");

		$tree = new Tree();
		while(list($id, $parent, $nodeText) = fgetcsv($dataFile)){
			$tree->addNode($nodeText, $id, $parent);
		}

		return $tree;
	}

	function jsonSerialize() {
		return $this->parents[0]["children"];
	}
}
