<?php

namespace me\adamcameron\kahlan\spec;

class Helper
{
	private $testName;

	public function __construct($test)
	{
		$this->testName = $this->getTestName($test);
	}

	public function loadTestData()
	{
		return (object)[
			'getLastRunForJob' => $this->decodeJsonFile('getLastRunForJob.json'),
			'getBookingsSince' => $this->decodeJsonFile('getBookingsSince.json'),
			'getCustomerByEmailAddress' => $this->decodeJsonFile('getCustomerByEmailAddress.json'),
			'saveCustomerByEmail' => $this->decodeJsonFile('saveCustomerByEmail.json')
		];
	}

	private function decodeJsonFile($file)
	{
		$dataPath = realpath(__DIR__ . "/../test/acceptance/job/syncCustomersJobTests/data/$this->testName");
		$dataFile = $dataPath . '/' . $file;
		if (!file_exists($dataFile)) {
			return null;
		}

		return json_decode(file_get_contents($dataFile), true);
	}

	private function getTestName($object)
	{
		if (is_object($object)) {
			return $this->getTestNameFromObject($object);
		}
		return $this->getTestNameFromFile($object);
	}

	private function getTestNameFromFile($file)
	{
		$file = preg_replace('/\.php$/','', $file);
		return $this->getTestFromPath($file);
	}

	private function getTestNameFromObject($object)
	{
		return $this->getTestFromPath(get_class($object));
	}

	private function getTestFromPath($path)
	{
		$pathComponents = explode('\\', $path);
		$lastElement = end($pathComponents);
		$test = preg_replace('/(?:Test|Spec)$/', 'Test', $lastElement);

		return lcfirst($test);
	}
}