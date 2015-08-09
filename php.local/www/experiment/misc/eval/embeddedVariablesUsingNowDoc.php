<?php
$i = 17;

$code = <<<'code'
$result = $i ** 2;
code;

eval($code);
echo $result;
