<?php

namespace me\adamcameron\mocking\test\helper;

class ReflectionHelper {

    public static function setPrivateProperty($class, $object, $property, $value) {
        $reflectionClass = new \ReflectionClass($class);
        $reflectionProperty = $reflectionClass->getProperty($property);

        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, $value);
    }

}