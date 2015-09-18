<?php

function filterOutThreeLetterWords($words){
    return array_filter($words, function($word){
        return strlen($word) != 3;
    });
}

$source = ['tahi', 'rua', 'toru', 'wha', 'rima', 'ono', 'whitu', 'waru', 'iwa', 'tekau'];
$expected = ['tahi', 'toru', 'rima', 'whitu', 'waru', 'tekau'];

$actual = filterOutThreeLetterWords($source);

$ok = array_reduce($actual, function($result, $element) use (&$expected) {
    return $result && $element == array_shift($expected);
}, true);

var_dump($ok);

