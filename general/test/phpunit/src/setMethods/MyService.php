<?php

namespace me\adamcameron\phpunit\setMethods;

class MyService
{

    private $myDecorator;

    public function __construct(MyDecorator $myDecorator)
    {
        $this->myDecorator = $myDecorator;
    }

    public function decorateMessage($message)
    {
        $message = $this->myDecorator->addPrefix($message);
        $message = $this->myDecorator->addSuffix($message);
        return $message;
    }

}
