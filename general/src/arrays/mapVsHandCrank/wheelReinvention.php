<?php
class Person {
	public $name;
	
	function __construct($name){
		$this->name = $name;
	}
}
$people = [new Person("Vyvyan"), new Person("Rik"), new Person("Neil"), new Person("Mike")];


function sortPeople($people) {
	if (!count($people)) {
		return [];
	}
	$pivot = $people[0];
	$left = $right = [];

	for ($i=1; $i < count($people); $i++) {
		if ($people[$i]->name < $pivot->name) {
			$left[] = $people[$i];
			continue;
		}
		$right[] = $people[$i];
	}

	return array_merge(sortPeople($left), [$pivot], sortPeople($right));
}

$sortedPeople = sortPeople($people);

var_dump([
    'unsorted' => json_encode($people),
    'sorted' => json_encode($sortedPeople)
]);

$samePeople = [new Person("Vyvyan"), new Person("Rik"), new Person("Neil"), new Person("Mike")];
usort($samePeople, function ($p1, $p2){
	return $p1 <=> $p2;
});

var_dump(json_encode($samePeople));
