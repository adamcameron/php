<?php

$xml = array_map(function($childCount) {
    $childElementsToCreate = $childCount == 0 ? [] : range(1, $childCount);
    $raw = "<doc><container>"
            . array_reduce($childElementsToCreate, function($children, $i) {
                return "$children<child>text for child $i</child>";
            }, "")
            . "</container></doc>";

	return new SimpleXMLElement($raw);
}, range(0, 2));

array_walk($xml, function($xml, $i){
    echo PHP_EOL . PHP_EOL . "Accessing child text elements from XML doc with $i child node(s):" . PHP_EOL;
    var_dump($xml->children()[0]->children()->child);

});