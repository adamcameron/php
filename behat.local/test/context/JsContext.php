<?php

namespace test\context;

use Behat\MinkExtension\Context\MinkContext;

class JsContext extends MinkContext
{
    /**
     * @Given I wait for the JavaScript content to load
     */
    public function iWaitForTheJavascriptContentToLoad()
    {
        $this->getSession()->wait(5000,
            "$('#jsContent').text() == 'This is content loaded via JavaScript'"
        );
    }
}
