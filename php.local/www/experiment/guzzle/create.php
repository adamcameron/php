<?php

require __DIR__ . "/data.php";

$newPerson = new Person(
    uniqid(),
    $_POST['firstName'],
    $_POST['lastName']
);

$result = (array) $newPerson;

sleep(5);
$result["retrieved"] = (new DateTime())->format("Y-m-d H:i:s");

header("type:application/json");
echo json_encode($result);
