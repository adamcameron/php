<?php
$strings = [];
$strings[] = <<<XML
<doc>
    <container/>
</doc>
XML;
$strings[] = <<<XML
<doc>
    <container>
        <item id="1" />
    </container>
</doc>
XML;
$strings[] = <<<XML
<doc>
    <container>
        <item id="2" />
        <item id="3" />
    </container>
</doc>
XML;
$strings[] = <<<XML
<doc>
    <container>
        <item id="2" />
        <otheritem id="4" />
        <item id="3" />
        <otheritem id="5" />
    </container>
</doc>
XML;

foreach ($strings as $raw) {
    echo PHP_EOL;
    $xml = new SimpleXMLElement($raw);
    $collectionElements = $xml->container->children();

    echo "Collection Size: " . $collectionElements->count() . PHP_EOL . PHP_EOL;
    var_dump($collectionElements);

    echo PHP_EOL . "===========================================" . PHP_EOL;
}
