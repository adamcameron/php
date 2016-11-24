<?php
$id = $_GET["id"];
parse_str(file_get_contents("php://input"),$put_vars);

require __DIR__ . "/data.php";

$filteredPeople = array_filter($people, function($person) use ($id) {
	return $person->id == $id;
});

if (empty($filteredPeople)){
	http_response_code(400);
	throw new InvalidArgumentException("No Person with ID $id found");
}

$person = array_shift($filteredPeople);

$newPerson = new Person(
	$person->id,
	$put_vars['firstName'],
	$put_vars['lastName']
);

$result = [
	'before' => (array) $person,
	'after' => (array) $newPerson,
	'updated' => (new DateTime())->format("Y-m-d H:i:s")
];

header("type:application/json");
echo json_encode($result);

