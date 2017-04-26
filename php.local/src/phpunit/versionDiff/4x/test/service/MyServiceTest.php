<?php

namespace me\adamcameron\phpunitdiff\test\service;

class MyServiceTest extends \PHPUnit_Framework_TestCase
{

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        error_log("IN CONSTRUCTOR  (" .spl_object_hash($this) . ")". PHP_EOL, 3, 'C:\temp\err4.log');
        parent::__construct($name, $data, $dataName);
    }

    public function setup()
    {
        error_log("IN TEST  (" .spl_object_hash($this) . ")". PHP_EOL, 3, 'C:\temp\err4.log');
    }

    /** @dataProvider provideCasesForMyMethodTests */
    public function testMyMethod($variant)
    {
        error_log("IN TEST  (" . spl_object_hash($this) . ")". PHP_EOL, 3, 'C:\temp\err4.log');
        $this->assertTrue(true);
    }

    public function provideCasesForMyMethodTests()
    {
        error_log("IN DP  (" .spl_object_hash($this) . ")". PHP_EOL, 3, 'C:\temp\err4.log');
        return [
            'tahi' =>['variant' => 1],
            'rua' =>['variant' => 2],
            'toru' =>['variant' => 3],
            'wha' =>['variant' => 4]
        ];
    }
}
