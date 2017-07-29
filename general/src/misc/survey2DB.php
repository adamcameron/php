<?php

$conn = new PDO('mysql:host=localhost;dbname=scratch;port=3306', 'scratch', 'scratch');

$allAnswers = [];

try {
	$csvFile = 'C:\temp\survey_data.csv';
	$csv = fopen($csvFile, 'r');

	$questions = fgetcsv($csv);
	$respondentId = 0;
	while ($respondentAnswers = fgetcsv($csv)) {

		$respondentId++;

		$answersByQuestion = array_reduce($respondentAnswers, function($answersByQuestion, $answer){
			$questionId = count($answersByQuestion) + 1;
			$answersByQuestion["$questionId"] = $answer;
			return $answersByQuestion;
		}, []);

		$allAnswers["$respondentId"] = $answersByQuestion;
	}
} finally {
	fclose($csv);
}

foreach ($allAnswers as $respondentId=>$responses){
	$statement = $conn->prepare('INSERT INTO respondent () VALUES ()');
	$statement->bindParam('q', $respondentId);
	$result = $statement->execute();
	if (!$result) {
		var_dump($statement->errorInfo());
		die;
	}

	foreach ($responses as $questionId=>$answer){
		$statement = $conn->prepare('
			INSERT INTO response (respondentId, questionId, answer)
			VALUES (:respondentId, :questionId, :answer)
		');
		$statement->bindParam('respondentId', $respondentId);
		$statement->bindParam('questionId', $questionId);
		$statement->bindParam('answer', $answer);
		$result = $statement->execute();

		if (!$result) {
			var_dump($statement->errorInfo());
			die;
		}
	}

}