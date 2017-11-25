<?php

namespace me\adamcameron\general\test\helper;

class ReflectionHelper
{
    public static function invokeMethod($object, $method, $arguments = [])
    {
        $reflectedClass = new \ReflectionClass($object);
        $reflectedMethod = $reflectedClass->getMethod($method);
        $reflectedMethod->setAccessible(true);
        return $reflectedMethod->invokeArgs(is_object($object) ? $object : $reflectedClass, $arguments);
    }

    public static function setProperty($object, $property, $value)
    {
        $reflectedClass = new \ReflectionClass($object);
        $reflection = $reflectedClass->getProperty($property);
        $reflection->setAccessible(true);
        $reflection->setValue($object, $value);
    }

    public static function getProperty($object, $property)
    {
        $reflectedClass = new \ReflectionClass($object);
        $reflection = $reflectedClass->getProperty($property);
        $reflection->setAccessible(true);
        return $reflection->getValue($object);
    }
}
