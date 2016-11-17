<?php
use doctrineTest\DoctrineApplication;

require_once __DIR__ . "/vendor/autoload.php";

$configDirectoryPath = realpath(__DIR__ . "/config");
$app = new DoctrineApplication([
	"configDir"=>$configDirectoryPath,
	"debug"=>true
]);
$app->run();
