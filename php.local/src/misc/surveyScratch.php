<?php

$conn = new PDO('mysql:host=localhost;dbname=scratch;port=3306', 'scratch', 'scratch');

$answers = $conn->query('
	SELECT q.id AS questionId, a.respondentId, a.answer
	FROM question q
	INNER JOIN response a
	ON q.id = a.questionId
	WHERE q.id <= 3
	ORDER BY q.id
	LIMIT 20
');


var_dump($answers);

$groupedAnswers = [];
foreach ($answers as $answer){
	var_dump($answer);
	$groupedAnswers[$answer['questionId']] = $groupedAnswers[$answer['questionId']] ?? [];

}

var_dump($groupedAnswers);