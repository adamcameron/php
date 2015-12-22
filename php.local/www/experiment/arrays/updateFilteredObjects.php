<?php

$colours = [
    (object) ['id' => 1, 'en' => 'red', 'mi' => 'whero'],
    (object) ['id' => 2, 'en' => 'orange', 'mi' => 'karaka'],
    (object) ['id' => 3, 'en' => 'yellow', 'mi' => 'kowhai'],
    (object) ['id' => 4, 'en' => 'green', 'mi' => 'kakariki'],
    (object) ['id' => 5, 'en' => 'blue', 'mi' => 'kikorangi'],
    (object) ['id' => 6, 'en' => 'indigo', 'mi' => 'poropango'],
    (object) ['id' => 7, 'en' => 'violet', 'mi' => 'papura']
];

$filteredColours = array_filter($colours, function ($colour) {
    if ($colour->id % 2 == 1) {
        $colour->ok = true;

        return true;
    }

    return false;
});

var_dump($filteredColours);

$reducedColours = array_reduce($colours, function ($filteredColours, $colour) {
    if ($colour->id % 2 == 1) {
        $colour->ok = true;

        $filteredColours[] = $colour;
    }

    return $filteredColours;
}, []);
var_dump($reducedColours);