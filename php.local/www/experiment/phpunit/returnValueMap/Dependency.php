<?php

namespace returnValueMap;

class Dependency{


    public function __construct(){
    }

    public function helpMyFunction($label, $array){
        $firstElementValue = $array['firstElement'];
        $secondElementValue = $array['secondElement'];
        return "(ACTUAL) $label: [$firstElementValue, $secondElementValue]";
    }

}
