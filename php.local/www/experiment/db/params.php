<?php
$host = 'localhost';
$port = '3306';
$dbName = 'scratch';
$user = 'scratch';
$pwd = 'scratch';

$connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', $host, $port, $dbName);
$conn = new PDO($connectionString, $user, $pwd);

$sql = "SELECT en, mi FROM colours WHERE id = :id";

$statement = $conn->prepare($sql);

foreach ([1,2,3,4,5,6,7] as $id) {
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
	$result = $statement->fetchAll();
	var_dump([$id, $result]);
}
