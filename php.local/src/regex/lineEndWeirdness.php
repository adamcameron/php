<?php

$control = 'abc';
$experimentWithLf = 'abc' . chr(10);
$experimentWithCr = 'abc' . chr(13);

$p1 = '/^abc$/';
$p2 = '/\Aabc\z/';

$result = [
    'control' => [
        'with ^$' => preg_match($p1, $control),
        'with \A\z' => preg_match($p2, $control)
    ],
    'experimentWithLf' => [
        'with ^$' => preg_match($p1, $experimentWithLf),
        'with \A\z' => preg_match($p2, $experimentWithLf)
    ],
    'experimentWithCr' => [
        'with ^$' => preg_match($p1, $experimentWithCr),
        'with \A\z' => preg_match($p2, $experimentWithCr)
    ]
];
print_r($result);

