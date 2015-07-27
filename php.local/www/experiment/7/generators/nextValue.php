<?php
function getNumber(){
    foreach(['tahi', 'rua', 'toru', 'wha'] as $i){
        $message = yield $i;
        echo $message;
    }
}
$numbers = getNumber();

echo $numbers->current();
$numbers->next("test");
echo $numbers->current();
$numbers->next();
echo $numbers->current();
$numbers->next();
echo $numbers->current();
$numbers->next();
