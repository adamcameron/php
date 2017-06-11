<?php

namespace me\adamcameron\silex2\test\acceptance;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class PageTest extends TestCase
{

    public function testHomePage()
    {
        $this->markAsRisky(); //relies on hard coded environment. TODO: replace

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'http://silex2.local/',
            CURLOPT_RETURNTRANSFER => true
        ]);
        $content = curl_exec($ch);
        $info = curl_getinfo($ch);
        $code = $info['http_code'];

        $this->assertSame(Response::HTTP_OK, $code);
        $this->assertContains('This is the Home Page', $content);
    }

    public function testNumberByIdAndLanguagePage()
    {
        $this->markAsRisky(); //relies on hard coded environment. TODO: replace

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'http://silex2.local/number/1/lang/mi',
            CURLOPT_RETURNTRANSFER => true
        ]);
        $content = curl_exec($ch);
        $info = curl_getinfo($ch);
        $code = $info['http_code'];

        $this->assertSame(Response::HTTP_OK, $code);
        $result = json_decode($content);
        $expected = (object) [
            'id' => 1,
            'lang' => 'mi',
            'number' => 'PLACEHOLDER'
        ];
        $this->assertEquals($expected, $result);
    }
}
