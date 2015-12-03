<?php
namespace returnValueMap;

class Processor {

    public function process($label, $object){
        $property = $object->property;
        return "(PROCESS $property (processed with $label))";
    }

}
