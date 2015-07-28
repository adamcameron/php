<?php
// safeRun.php

function safeRun($message="", $task){
	echo $message . "<br>";
	try {
		$task();
		echo "Ran OK<br>";
	}catch (Throwable $t){
		printf("Code: %s<br>", $t->getCode());
		printf("Message: %s<br>", $t->getMessage());
	}finally {
		echo "<hr>";
	}
}