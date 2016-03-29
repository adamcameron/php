<?php

namespace me\adamcameron\someapp\test\helper;

class MockHelper extends \PHPUnit_Framework_TestCase {

    function mockObject($class, $methods=null, $constructorArgs=null){
        $mockObjectBuilder = $this->getMockBuilder($class);

        if (is_null($constructorArgs)){
            $mockObjectBuilder->disableOriginalConstructor();
        }else{
            $mockObjectBuilder->setConstructorArgs($constructorArgs);
        }

        if (!is_null($methods)){
            $mockObjectBuilder->setMethods(array_keys($methods));
        }
        $mockedObject = $mockObjectBuilder->getMock();

        foreach ($methods as $method=>$mock){
            if (array_key_exists("expects", $mock)){
                $methodMocker = $mockedObject->expects($mock["expects"]);
            }else{
                $methodMocker = $mockedObject;
            }
            $mockedMethod = $methodMocker->method($method);

            if (array_key_exists("with", $mock)){
                call_user_func_array([$mockedMethod, 'with'], $mock["with"]);
            }

            if (array_key_exists("will", $mock)){
                $mockedMethod->will($mock["will"]);
            }

            if (array_key_exists("willReturn", $mock)){
                $mockedMethod->willReturn($mock["willReturn"]);
            }
        }
        return $mockedObject;
    }

}