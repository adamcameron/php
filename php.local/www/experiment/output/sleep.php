<?php
ob_start();
for($i=1; $i<=10;$i++){
    echo ".";
    ob_flush();
    sleep(1);
}