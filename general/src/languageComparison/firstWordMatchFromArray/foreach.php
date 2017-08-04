<?php
$words = ["a", "at", "cat", "scat", "catch"];

$match = null;
foreach($words as $word) {
	if ($this->someObject->someMethod($word)) {
		$match = $word;
		break;
	}
}

echo $match;