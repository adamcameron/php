<?php

namespace me\adamcameron\decorator\service\logger;

class NullLoggerService implements LoggerServiceInterface {

	public function logText($text){
		echo "NullLoggerService used<br>";
	}

}