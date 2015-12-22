<?php

namespace returnValueMap;

class SimpleTest extends \PHPUnit_Framework_TestCase
{
    public function testMyFunction()
    {
        $testObject = (object) [
            'firstProperty' => 'first property value',
            'secondProperty' => 'second property value'
        ];

        $mockedDependency = $this->getMockedDependency($testObject);
        $simple = new Simple($mockedDependency);

        $result = $simple->myFunction($testObject);

        $this->assertEquals('MOCKED result', $result);
    }

    private function getMockedDependency($testObject)
    {
        $valueMap = [
            [
                'hardcodedValue',
                [
                    'firstElement' => $testObject->firstProperty,
                    'secondElement' => $testObject->secondProperty
                ],
                'MOCKED result'
            ]
        ];
        $mockedDependency = $this->getMockBuilder('Dependency')
            ->setMethods(['helpMyFunction'])
            ->getMock();
        $mockedDependency->expects($this->once())
            ->method('helpMyFunction')
            ->will($this->returnValueMap($valueMap));

        return $mockedDependency;
    }
}
