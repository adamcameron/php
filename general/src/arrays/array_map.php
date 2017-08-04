<?php

require __DIR__ . '/Number.php';
$connectionString = sprintf(
    "mysql:host=%s;port=%s;dbname=%s",
    'localhost',
    3306,
    'scratch'
);
$conn = new \PDO(
    $connectionString,
    'scratch',
    'scratch'
);

$statement = $conn->prepare('
    SELECT
        id, mi, en
    FROM
        numbers
    WHERE
        MOD(id, 2) = 0 
    ORDER BY
        id
');
$statement->execute();
$numbersValues = $statement->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);


$numbers = [];
foreach ($numbersValues as $id => $numberValues) {
    $numbers[$id] = new Number(
        $id,
        $numberValues['mi'],
        $numberValues['en']
    );
}

var_dump($numbers);


$numbers = array_map(function($numberValues){
    return new Number(null, $numberValues['mi'], $numberValues['en']);
}, $numbersValues);

var_dump($numbers);


$numbers = array_map(function($numberValues, $id){
    return new Number($id, $numberValues['mi'], $numberValues['en']);
}, $numbersValues, array_keys($numbersValues));

var_dump($numbers);
