<?php

/*$i1 = 5;
$i2 = 7;
echo "$i1 > $i2: " . booleanAsString($i1 > $i2) . PHP_EOL;
echo "$i1 < $i2: " . booleanAsString($i1 < $i2) . PHP_EOL;

$f1 = 5.5;
$f2 = 7.7;
echo "$f1 > $f2: " . booleanAsString($f1 > $f2) . PHP_EOL;
echo "$f1 < $f2: " . booleanAsString($f1 < $f2) . PHP_EOL;

$s1 = "a";
$s2 = "z";
echo "$s1 > $s2: " . booleanAsString($s1 > $s2) . PHP_EOL;
echo "$s1 < $s2: " . booleanAsString($s1 < $s2) . PHP_EOL;

$s1 = "A";
$s2 = "a";
echo "$s1 > $s2: " . booleanAsString($s1 > $s2) . PHP_EOL;
echo "$s1 < $s2: " . booleanAsString($s1 < $s2) . PHP_EOL;

$b1 = true;
$b2 = false;
echo sprintf("%s > %s: ", booleanAsString($b1), booleanAsString($b2)) . booleanAsString($b1 > $b2) . PHP_EOL;
echo sprintf("%s < %s: ", booleanAsString($b1), booleanAsString($b2)) . booleanAsString($b1 < $b2) . PHP_EOL;

$o1 = (object) ["i"=>5];
$o2 = (object) ["i"=>7];
echo sprintf("%s > %s: ", json_encode($o1), json_encode($o2)) . booleanAsString($o1 > $o2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($o1), json_encode($o2)) . booleanAsString($o1 < $o2) . PHP_EOL;

$a1 = ["i"=>5];
$a2 = ["i"=>7];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;

$a1 = [5];
$a2 = [7];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;

$a1 = [5,7];
$a2 = [7,5];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;

$a1 = [5,7,"g","e"];
$a2 = [7,5,"e","g"];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;

$a1 = [5=>5];
$a2 = [7=>7];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;*/

$a1 = ["a" => 1, "b" => 0, "c" => 1];
$a2 = ["a" => 1, "c" => 0, "b" => 1];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;
/*
$a1 = [1 => 1, 2 => 0, 3 => 1];
$a2 = [1 => 1, 3 => 1, 2 => 0];
echo sprintf("%s > %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 > $a2) . PHP_EOL;
echo sprintf("%s < %s: ", json_encode($a1), json_encode($a2)) . booleanAsString($a1 < $a2) . PHP_EOL;
*/

function booleanAsString($expression){
    return $expression ? "true" : "false";
}
