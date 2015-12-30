<?php

namespace test\context;

use Behat\MinkExtension\Context\MinkContext;

class JsContext extends MinkContext
{

    private $waitDuration = 5000;

    /**
     * @Given I wait for the JavaScript content to load
     */
    public function iWaitForTheJavascriptContentToLoad()
    {
        $this->getSession()->wait($this->waitDuration,
            "$('#jsContent').text() == 'This is content loaded via JavaScript'"
        );
    }

    /**
     * @Given I wait for the AJAX content to load
     */
    public function iWaitForTheAJAXContentToLoad()
    {
        $this->getSession()->wait($this->waitDuration, '(0 === jQuery.active)');
    }
}
