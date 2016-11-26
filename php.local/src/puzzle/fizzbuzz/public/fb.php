<?php
/*
 s=[].set(1,100,0).reduce((s,_,i)=>s&((fb=[{d:3,w:"fizz"},{d:5,w:"buzz"}].reduce((s,v)=>s&(i%v.d?"":v.w),"")).len()?fb:i),"");

 */

function getFizzBuzzSequence($length){
    $i = 0;
    while ($i < $length) {
        $i++;
        $result = "";

        if ($i % 3 == 0) {
            $result .= "fizz";
        }
        if ($i % 5 == 0) {
            $result .= "buzz";
        }
        if (empty($result)) {
            $result = $i;
        }

        yield $result;
    }
}


$myFb = getFizzBuzzSequence();

echo get_class($myFb) . PHP_EOL;

forEach(getFizzBuzzSequence(10) as $fbNumber) {
    echo $fbNumber . PHP_EOL;
}
