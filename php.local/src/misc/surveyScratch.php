<?php

$conn = new PDO('mysql:host=localhost;dbname=scratch;port=3306', 'scratch', 'scratch');

$answers = $conn->query('
	SELECT q.id AS questionId, q.question, a.respondentId, a.answer
	FROM question q
	INNER JOIN response a
	ON q.id = a.questionId
	where q.id <= 5
	ORDER BY a.respondentId, q.id
');

$groupedByQuestion = [];
$groupedByRespondent = [];
foreach ($answers as $answer){
	if (!isset($groupedByQuestion[$answer['questionId']])){
		$groupedByQuestion[$answer['questionId']] = [
			'id' => $answer['questionId'],
			'question' => $answer['question'],
			'answers' => []
		];
	}
	$groupedByQuestion[$answer['questionId']]['answers'][$answer['respondentId']] = $answer['answer'];

	if (!isset($groupedByRespondent[$answer['respondentId']])) {
		$groupedByRespondent[$answer['respondentId']] = [];
	}
	$groupedByRespondent[$answer['respondentId']][$answer['questionId']] = $answer['answer'];
}

echo '<ol>' . PHP_EOL;
foreach ($groupedByQuestion as $question) {
	echo "<li>" .  $question['question'] . "</li>" . PHP_EOL;
}
echo '</ol>' . PHP_EOL;
foreach ($groupedByRespondent as $id=>$answer) {
	echo "Respondent $id<br>";
	echo "<blockquote><ol>";
	foreach ($groupedByQuestion as $question) {
		echo "<li>" .  $answer[$question['id']] . "</li>" . PHP_EOL;
	}
	echo "</ol></blockquote><hr>";
}
