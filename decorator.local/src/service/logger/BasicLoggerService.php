<?php

namespace me\adamcameron\decorator\service\logger;

class BasicLoggerService implements LoggerServiceInterface {

	public function logText($text){
		echo "BasicLoggerService used<br>";
		error_log($text);
	}

}