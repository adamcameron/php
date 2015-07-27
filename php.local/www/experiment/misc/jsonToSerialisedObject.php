<?php
$dir =  'c:/temp/';
$srcFile = $dir . 'data.json';
$dstFile = $dir . 'data.bin';
$json = file_get_contents($srcFile);
$php = json_decode($json);
$bin = serialize($php);
file_put_contents($dstFile, $bin);