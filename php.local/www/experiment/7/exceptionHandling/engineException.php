<?php
// engineException.php

try {
    function takesInt(int $x){
        return true;
    }

    takesInt('not an int');
} catch(TypeError $e) {
	echo 'EngineException caught<br>';
}
