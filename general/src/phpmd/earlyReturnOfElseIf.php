<?php

function takeAChance(){
    $firstChance = (bool) rand(0,1);
    $secondChance = (bool) rand(0,1);

    if ($firstChance) {
        echo "firstChance was true; don't care what secondChance was";
        return;
    }
    if ($secondChance){
        echo "well at least secondChance was true";
        return;
    }
    echo "both were false";
}

takeAChance();
