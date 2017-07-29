<?php

$s = <<<XML
<doc>
    <container>
        <item id="2" />
        <otheritem id="4" />
        <item id="3" />
        <otheritem id="5" />
    </container>
</doc>
XML;

$xml = new SimpleXMLElement($s);
$collectionElements = $xml->container->children();

foreach ($collectionElements as $index => $element) {
    echo $index . PHP_EOL;
    var_dump($element);
    echo "============================" . PHP_EOL;
}
