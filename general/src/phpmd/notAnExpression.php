<?php

function takeAChance(){
    $firstChance = (bool) rand(0,1);

    $message = if ($firstChance) {
        "firstChance was true";
    } else {
        "firstChance was false";
    }
}

takeAChance();
