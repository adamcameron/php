<?php
$host = 'localhost';
$port = '3306';
$dbName = 'scratch';
$user = 'scratch';
$pwd = 'scratch';

$connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', $host, $port, $dbName);
$connection = new PDO($connectionString, $user, $pwd);

$statement = $connection->prepare("SELECT mi FROM numbers WHERE id = :id");

$digits = [1,2,3,4,5,6,7,8,9,10];
$maoriNumbers = array_map(
	function ($id) use ($statement) {
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_COLUMN);
	},
	$digits
);
var_dump($maoriNumbers);
