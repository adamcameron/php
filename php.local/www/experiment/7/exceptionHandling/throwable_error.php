<?php
// throwable_error.php

try {
    function takesInt(int $x){
        return true;
    }

    takesInt('not an int');
} catch (Exception $e){
    echo 'Exception caught<br>';
} catch (Throwable $t) {
    echo 'Throwable caught<br>';
} finally {
    echo 'In finally<br>';
}
