<?php

namespace me\adamcameron\silexApp\test\functional\app;

use me\adamcameron\silexApp\app\SilexApp;
use Silex\patch\WebTestCase;

class SilexAppTest extends WebTestCase
{

    public function createApplication()
    {
        $app = new SilexApp([]);
        return $app;
    }

    public function testAppLoad()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/invalidRoute');

        $this->assertTrue($client->getResponse()->isNotFound());
        $this->assertCount(1, $crawler->filter('h1:contains("Sorry, the page you are looking for could not be found.")'));
    }
}