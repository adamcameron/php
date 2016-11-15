<?php

namespace doctrineTest\pdo;

class ParameterHelper {

public static function createParameterListForSqlStatement($parameters){
	$paramPlaceholdersArray = array_map(function($i){return '?';}, $parameters);
	$paramPlaceholders = implode(',', $paramPlaceholdersArray);

	return $paramPlaceholders;
}
}

