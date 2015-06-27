<?php
// viaParam.php

$operator = $_GET['operator'] ?? 'divide';
$divisor = $_GET['divisor'] ?? 0;
try {

	if ($operator == 'divide'){
		$result = 1 / $divisor;
	}else{
		$result = 1 % $divisor;
	}
} catch (Throwable $t){
	echo "Operator: $operator<br>";
	printf("Type: %s<br>", get_class($t));
	printf("Message: %s<br>", $t->getMessage());
}