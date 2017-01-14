<?php

function takeAChance(){
    $firstChance = (bool) rand(0,1);

    if ($firstChance) {
        echo "firstChance was true";
        return;
    }
    echo "firstChance was false";
}

takeAChance();
