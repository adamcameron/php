<?php
$modifyString = '+' . $_GET['days'] . ' day';
$newDate = new DateTime();
$newDate->modify($modifyString)->getTimestamp();

var_dump($newDate);