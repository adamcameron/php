<?php

namespace me\adamcameron\general\phpunit\callLog;

class MyService
{

    private $logger;
    private $helper;

    public function __construct(MyLogger $logger, MyFlakyHelper $helper)
    {
        $this->logger = $logger;
        $this->helper = $helper;
    }

    public function myMethod($times){
        try {
            $this->logger->logMessage("Starting off");
            for ($i=1; $i <= $times; $i++) {
                $this->logger->logMessage("Starting processing iteration $i");
                $this->helper->doThing();
                $this->logger->logMessage("Finished processing iteration $i");
            }
            $this->logger->logMessage("Finishing off");
        }
        catch (\Exception $e) {
            $this->logger->logMessage(sprintf("Something went wrong: %s", $e->getMessage()));
            throw $e;
        }
        finally {
            $this->logger->logMessage("All done");
        }
    }

}
