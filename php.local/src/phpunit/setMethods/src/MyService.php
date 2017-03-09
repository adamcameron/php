<?php

namespace me\adamcameron\myApp;

class MyService
{

    private $myDependency;

    public function __construct(MyDependency $myDependency)
    {
        $this->myDependency = $myDependency;
    }

    public function testMe($message)
    {
        $decoratedMessage = $this->myDependency->decorate($message);
        return "(PREFIX ADDED BY METHOD) $decoratedMessage";
    }

}
