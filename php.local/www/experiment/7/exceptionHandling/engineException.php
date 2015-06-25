<?php
// engineException.php

try {
    function takesInt(int $x){
        return true;
    }

    takesInt('not an int');
} catch(EngineException $e) {
	echo 'Exception caught<br>';
}
