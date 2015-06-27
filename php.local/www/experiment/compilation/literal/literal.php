<?php
// literal.php

$operator = $_GET['operator'] ?? 'divide';
try {
	if ($operator == 'divide'){
		$result = 1 / 0;
	}else{
		$result = 1 % 0;
	}
} catch (Throwable $t){
	echo "Operator: $operator<br>";
	printf("Type: %s<br>", get_class($t));
	printf("Message: %s<br>", $t->getMessage());
}