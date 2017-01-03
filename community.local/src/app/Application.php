<?php

namespace community\app;

use \Silex\Application as SilexApplication;
use Silex\Provider\MonologServiceProvider;

class Application extends SilexApplication {

    function __construct() {

        parent::__construct();
        $this->registerServices();
        $this->mountControllers();
    }

    function registerServices(){
        $this->register(new MonologServiceProvider(), [
            "monolog.logfile" => realpath(__DIR__ . "/../../log") . "/general.log"
        ]);
    }

    function mountControllers() {
        $this->get('/testLog', 'community\controller\TestLogController::doGet');
    }

}