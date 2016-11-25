<?php
/*
 s=[].set(1,100,0).reduce((s,_,i)=>s&((fb=[{d:3,w:"fizz"},{d:5,w:"buzz"}].reduce((s,v)=>s&(i%v.d?"":v.w),"")).len()?fb:i),"");

 */

function getNextFizzBuzz(){
    $i = -1;
    while (true) {
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


$myFb = getNextFizzBuzz();

for ($i=0; $i < 20; $i++) {
    $myFb->next();
    echo $myFb->current() . PHP_EOL;
}
