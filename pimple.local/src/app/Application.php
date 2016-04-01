<?php

namespace me\adamcameron\pimpleBug\app;

use me\adamcameron\pimpleBug\service\MyService;
use Pimple\Container;

class Application  {

    public $di;

    function __construct() {
        $this->setDependencies();
    }

    function setDependencies() {
        $this->di = new Container();

        $this->di["service.viaFunctionLiteral.my"] = function($di){
            return new MyService();
        };

        $this->di["service.viaFunctionStatement.my"] = call_user_func([$this, "getMyService"]);
    }

    function getMyService(){
        return new MyService();
    }

}
