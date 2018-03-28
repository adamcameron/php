<?php

namespace dac\s4\test\functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Response;

class SiteTest extends WebTestCase
{

    public static function createKernel(array $options = array())
    {
        (new Dotenv())->load(__DIR__ . '/.env');
    }

    public function testSite()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

}
