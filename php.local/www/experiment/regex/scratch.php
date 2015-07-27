<?php
$s = 'This is the property';
for ($i=1; $i <= 20; $i++){
    $s = preg_replace('/^(.*?)(?: \(\d+\))?$/', "\\1 ($i)", $s);
    echo "$s<br>";
}