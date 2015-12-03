<?php

namespace returnValueMap;

class ActualTest extends \PHPUnit_Framework_TestCase
{
    private $actual;
    private $mockedPackageResult = 'mocked_package_result';
    private $mockedPrepareResultPrefix = 'mocked_prepare_result';
    private $mockedProcessResultPrefix = 'mocked_process_result';

    public function setup()
    {
        $testObject = (object) ['property' => 'test property value'];

        $mockedPreparer = $this->mockPreparer();
        $mockedProcessor = $this->mockProcessor($testObject);
        $mockedPackager = $this->mockPackager();
        $this->actual = new Actual($mockedPreparer, $mockedProcessor, $mockedPackager);
    }

    public function testActualise()
    {
        $result = $this->actual->actualise(null);

        $this->assertEquals($this->mockedPackageResult, $result);
    }

    private function mockPreparer()
    {
        $mockedPrepareResultPrefix = $this->mockedPrepareResultPrefix;
        $valueMap = [
            ['actual_preparation_flag_1', "{$mockedPrepareResultPrefix}_1"],
            ['actual_preparation_flag_2', "{$mockedPrepareResultPrefix}_2"]
        ];

        $mockedPreparer = $this->getMockBuilder('Preparer')
            ->setMethods(['prepare'])
            ->getMock();

        $mockedPreparer
            ->expects($this->exactly(2))
            ->method('prepare')
            ->will($this->returnValueMap($valueMap));

        return $mockedPreparer;
    }

    private function mockProcessor($testObject)
    {
        $mockedPrepareResultPrefix = $this->mockedPrepareResultPrefix;
        $mockedProcessResultPrefix = $this->mockedProcessResultPrefix;
        $valueMap = [
            ["{$mockedPrepareResultPrefix}_1", $testObject, "{$mockedProcessResultPrefix}_1"],
            ["{$mockedPrepareResultPrefix}_2", $testObject, "{$mockedProcessResultPrefix}_2"]
        ];

        $mockedProcessor = $this->getMockBuilder('Processor')
            ->setMethods(['process'])
            ->getMock();

        $mockedProcessor
            ->expects($this->exactly(2))
            ->method('process')
            ->will($this->returnValueMap($valueMap));

        return $mockedProcessor;
    }

    private function mockPackager()
    {
        $mockedProcessResultPrefix = $this->mockedProcessResultPrefix;
        
        $mockedPackager = $this->getMockBuilder('Packager')
            ->setMethods(['package'])
            ->getMock();

        $mockedPackager
            ->expects($this->once())
            ->method('package')
            ->with(
                'actual_package_flag',
                [
                    'element1' => "{$mockedProcessResultPrefix}_1",
                    'element2' => "{$mockedProcessResultPrefix}_2"
                ]
            )
            ->willReturn($this->mockedPackageResult);

        return $mockedPackager;
    }
}
