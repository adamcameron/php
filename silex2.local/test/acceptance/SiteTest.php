<?php

namespace me\adamcameron\silex2\test\acceptance;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class SiteTest extends TestCase
{

	public function testSite()
	{
		$this->markAsRisky(); //relies on hard coded environment. TODO: replace

		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => 'http://silex2.local:8070/',
			CURLOPT_RETURNTRANSFER => true
		]);
		$content = curl_exec($ch);
		$info = curl_getinfo($ch);
		$code = $info['http_code'];

		$this->assertSame(Response::HTTP_OK, $code);
		$this->assertSame('Home Page', $content);
	}
}