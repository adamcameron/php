<?php
namespace returnValueMap;

class Preparer {

    public function prepare($value){
        return "(PREPARE: Value: $value)";
    }

}
