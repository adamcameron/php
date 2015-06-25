<?php
// throwable_warning.php

echo 'Before everything<br>';
try {
    echo 'Before dodgy code<br>';
    $result = 1 / 0; // generates a warning, so not caught :-|
    echo 'After dodgy code<br>';
} catch (Throwable $t) {
    echo 'Throwable caught';
    echo '<pre>';
    var_dump($t);
    echo '</pre>';
} catch (Exception $e){
    echo 'Exception caught';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
} finally {
    echo 'In finally<br>';
}
echo 'After everything<br>';
