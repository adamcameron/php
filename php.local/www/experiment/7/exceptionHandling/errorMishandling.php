<?php
// errorMishandling.php

require __DIR__ . '/infrastructure.php';

try {
    $person = PersonFactory::getPersonFromId($_GET['id']);
} catch(Exception $e) {
	echo 'Exception caught<br>';
    die;
}
try {
	$result = doSomethingToPerson($person);
	echo 'Process ran OK<br>';
} catch(Exception $e) {
	echo 'Exception caught<br>';
} catch (EngineException $e){
	echo 'EngineException caught<br>';
} catch (TypeError $e){
	echo 'TypeError caught<br>';
} catch (Throwable $t){
	echo 'Throwable caught<br>';
} finally {
	echo 'In finally block<br>';
}

echo 'After try/catch/finally<br>';