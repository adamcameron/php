<?php

//[].set(1,100,"").reduce((s,_,i)=>s&(!i%15?"fizzbuzz":!i%3?"fizz":!i%5?"buzz":i),"")

echo array_reduce(range(1,100),function($s,$i){return $s.(!($i%15)?"fizzbuzz":(!($i%3)?"fizz":(!($i%5)?"buzz":$i)));},"");


array_reduce(
    range(1,100),
    function($s, $i){
        return $s . (
            !($i%15)
                ? "fizzbuzz"
                : (
                    !($i%3)
                        ? "fizz"
                        : (
                            !($i%5) ? "buzz" : $i
                        )
                )
        );
    },
    ""
);
