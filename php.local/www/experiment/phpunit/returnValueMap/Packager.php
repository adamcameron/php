<?php
namespace returnValueMap;

class Packager {

    public function package($flag, $array){
        return array_map(function($element) use ($flag) {
            return "(PACKAGE $element (packaged with $flag)";
        },$array);
    }

}
