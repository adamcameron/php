<?php

namespace me\adamcameron\silex2\test\acceptance;

use me\adamcameron\silex2\app\Application;
use Silex\WebTestCase;

class PageTest extends WebTestCase
{

    public function createApplication()
    {
        return new Application([]);
    }

    public function testHomePage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('body:contains("This is the Home Page")'));
    }

    public function testNumberByIdAndLanguagePage()
    {
        $client = $this->createClient();
        $client->request('GET', '/number/1/lang/mi');

        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $result = json_decode($response->getContent());
        $expected = (object) [
            'id' => 1,
            'name' => 'TAHI'
        ];
        $this->assertEquals($expected, $result);
    }
}
