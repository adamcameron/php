<?php

namespace test\typecheck;

use typecheck\MyDependency;
use typecheck\MyService;

class MyServiceTest extends \PHPUnit_Framework_TestCase {

    private $myDependency;
    private $myService;

    public function setup(){
        $this->myDependency = new MyDependency();
        $this->myService = new MyService();
    }

    /**
     * @dataProvider provideForMyMethodTests
     */
    public function testMyMethod($dependency, $expectedResult) {
        $testValue = "TEST VALUE";
        $actualResult = $this->myService->myMethod($dependency, $testValue);

        $this->assertSame($expectedResult, $actualResult);
    }

    public function provideForMyMethodTests(){
        $myDependency =  new MyDependency();
        $myMockedDependency = $this->getMockedDependency();
        return [
            "Actual object" => ["dependency" => $myDependency, "expectedResult"=>"TEST VALUE HAS BEEN PROCESSED BY DEPENDENCY METHOD"],
            "Mocked object" => ["dependency" => $myMockedDependency, "expectedResult"=>"TEST VALUE HAS BEEN PROCESSED BY MOCKED DEPENDENCY METHOD"]
        ];
    }

    private function getMockedDependency(){
        $mockedDependency = $this->getMockBuilder('\typecheck\MyDependency')
            ->setMethods(["dependencyMethod"])
            ->getMock();

        $mockedDependency
            ->method("dependencyMethod")
            ->willReturn("TEST VALUE HAS BEEN PROCESSED BY MOCKED DEPENDENCY METHOD");

        return $mockedDependency;
    }

}