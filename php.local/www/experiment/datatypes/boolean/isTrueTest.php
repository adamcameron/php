<?php

function isTrue1($value)
{
	if ($value === '0' || $value === 'false') {
		return false;
	}
	return !!$value;
}

function isTrue2($value)
{
	return filter_var($value, FILTER_VALIDATE_BOOLEAN);
}

$trues = [true, 'true', 1, '1', '-1', 'on', 'yes', 'ja'];
$falses = [false, 'false', 0, '0', 0.0, '0.0', 'off', 'no', 'nein'];
$booleans = array_merge($trues, $falses);

foreach($booleans as $b) {
	printf('[%s]: [%d][%d]<br>', $b, isTrue1($b), isTrue2($b));
}
