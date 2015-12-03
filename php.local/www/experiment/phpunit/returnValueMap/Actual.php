<?php

namespace returnValueMap;

class Actual{

    private $preparer;
    private $processor;
    private $packager;

    public function __construct($preparer, $processor, $packager){
        $this->preparer = $preparer;
        $this->processor = $processor;
        $this->packager = $packager;
    }

    public function actualise($object){
        return $this->packager->package(
            'actual_package_flag',
            [
                'element1' => $this->processor->process(
                    $this->preparer->prepare('actual_preparation_flag_1'),
                    $object
                ),
                'element2' => $this->processor->process(
                    $this->preparer->prepare('actual_preparation_flag_2'),
                    $object
                )
            ]
        );
    }

}
