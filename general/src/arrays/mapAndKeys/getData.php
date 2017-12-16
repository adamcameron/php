<?php

$conn = new PDO('mysql:host=localhost;dbname=scratch;port=3306', 'scratch', 'scratch');

$peopleData = $conn
    ->query('SELECT date, name FROM mapexampledata')
    ->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_COLUMN | PDO::FETCH_UNIQUE);

var_dump($peopleData);