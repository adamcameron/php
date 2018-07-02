<?php

$connection = new PDO("sqlsrv:Server=localhost;Database=scratch", "scratch", "scratch");

$statement = $connection->prepare("SELECT mi FROM numbers WHERE id = :id");

$digits = [1,2,3,4,5,6,7,8,9,10];
$maoriNumbers = array_map(
	function ($id) use ($statement) {
		$statement->execute([':id' => $id]);
		
		return $statement->fetch(PDO::FETCH_COLUMN);
	},
	$digits
);
var_dump($maoriNumbers);
 