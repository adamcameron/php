<?php
try {
    $zero = 0;
    1 % $zero;
} catch (Throwable $t){
    var_dump($t);
}