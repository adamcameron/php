<?php
// throwable_warning.php

echo 'Before everything<br>';
try {
    echo 'Before dodgy code<br>';

    function takesInt(int $x){
        return true;
    }

    takesInt('not an int');

    echo 'After dodgy code<br>';
} catch (Exception $e){
    echo 'Exception caught';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
} catch (EngineException $e){
    echo 'EngineException caught';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
} catch (Throwable $t) {
    echo 'Throwable caught hi';
    echo '<pre>';
    var_dump($t);
    echo '</pre>';
} finally {
    echo 'In finally<br>';
}
echo 'After everything<br>';
