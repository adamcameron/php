<?php

namespace returnValueMap;

class Simple{

    private $dependency;

    public function __construct($dependency){
        $this->dependency = $dependency;
    }

    public function myFunction($object){
        return $this->dependency->helpMyFunction(
            'hardcodedValue',
            [
                'firstElement' => $object->firstProperty,
                'secondElement' => $object->secondProperty
            ]
        );
    }

}
