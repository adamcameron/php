<?php

namespace me\adamcameron\silex2\test\acceptance;

use me\adamcameron\silex2\app\Application;
use Silex\WebTestCase;

class ApiCallTest extends WebTestCase
{

	public function createApplication()
	{
		return new Application([]);
	}

	public function testIndexRequest()
	{
		$client = $this->createClient();
		$client->request('GET', '/', [], [], ['content' => 'application/json']);

		$response = $client->getResponse();
		$this->assertTrue($response->isOk());
		var_dump($response->getContent());
	}
}
