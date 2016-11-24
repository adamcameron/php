<?php
$id = $_GET["id"];

require __DIR__ . "/data.php";

$filteredPeople = array_filter($people, function($person) use ($id) {
    return $person->id == $id;
});
$person = array_shift($filteredPeople);

$result = (array) $person;

sleep(5);
$result["retrieved"] = (new DateTime())->format("Y-m-d H:i:s");

header("type:application/json");
echo json_encode($result);
