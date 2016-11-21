<?php

namespace me\adamcameron\testApp;

class StatusToExceptionAdapterOld {

	private $adapter;
	private $exceptionMap;

	public function __construct($adapter, $exceptionMap) {
		$this->adapter = $adapter;
		$this->exceptionMap = $exceptionMap;
	}

	public function get($status){
		return $this->adapter
			->get($status)
			->otherwise(function($exception){
				$code = $exception->getCode();

				if (!array_key_exists($code, $this->exceptionMap)) {
					throw $exception;
				}
				throw new $this->exceptionMap[$code](
					"A response of $code was received from the service",
					$code,
					$exception
				);
			});
	}
}
