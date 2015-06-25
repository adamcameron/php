<?php
// throwable_warning.php

try {
    $result = 1 / 0;
} catch (Throwable $t) {
    echo 'Throwable caught';
} catch (Exception $e){
    echo 'Exception caught';
} finally {
    echo 'In finally<br>';
}
