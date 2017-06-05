<?php

function f($maximumIterations=null) {

	$a = new ArrayIterator(['tahi', 'rua', 'toru', 'wha']);

	$currentIteration=0;
	$hasRecords=null;

	$goodToGo = function() use (&$currentIteration, &$hasRecords, &$maximumIterations){
		$hasMoreRecords = is_null($hasRecords) ? true : $hasRecords;
		$isWithinMaxIterations = is_null($maximumIterations) ? true : $currentIteration <= $maximumIterations;
		return $hasMoreRecords && $isWithinMaxIterations;
	};

	while ($goodToGo()){
		$currentIteration++;
		printf('%s%s', $a->current(), PHP_EOL);
		$a->next();
		$hasRecords = $a->valid();
	}
}

f();