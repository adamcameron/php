<?php
$host = 'localhost';
$port = '3306';
$dbName = 'scratch';
$user = 'scratch';
$pwd = 'scratch';

$connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', $host, $port, $dbName);
$conn = new PDO($connectionString, $user, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$value = 'one two three four five six seven eight nine ten';
$sql = "insert into junk (data1) values (:data1)";

$statement = $conn->prepare($sql);
$statement->bindValue(':data1', $value);

$result = $statement->execute();

$errorCode = $conn->errorCode();
$errorInfo = $conn->errorInfo();
var_dump([$result, $errorCode, $errorInfo]);
