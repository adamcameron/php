<?php
try {
    1/0;
} catch (Throwable $t){
    var_dump($t);
}