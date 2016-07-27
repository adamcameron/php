<?php

$name = $_GET['name'] ?  $_GET['name'] : die('{"result":0, "data":"name not provided"}');
$state = $_GET['state'] ? $_GET['state'] : die('{"result":0, "data":"state not provided"}');
