<?php

namespace me\adamcameron\decorator\service\logger;

class BasicLoggerService {

	public function logText($text){
		error_log($text);
	}

}