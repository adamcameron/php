<?php
if (!isset($_GET["id"])){
 throw new Exception("ID is a required parameter");
}
$id = $_GET["id"];

logMessage("[ID: $id] request received");

sleep(1);

$result = [
	"id" => $id,
	"retrieved" => (new DateTime())->format("Y-m-d H:i:s")
];
echo json_encode($result);

logMessage("[ID: $id] response returned");


function logMessage($message){
	$logFile = __DIR__ . "\\endpointForGuzzleTests.log";
	$now = (new DateTime())->format("Y-m-d H:i:s");
	$logEntry = sprintf("[%s][%s]%s", $now, $message, PHP_EOL);
	error_log($logEntry, 3, $logFile);
}