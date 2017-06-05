<?php

class SimpleArrayIterator implements Iterator {
    
    private $array;
    private $index = -1;
    private $element;
    private $length;

    function __construct($array){
        $this->array = $array;
        $this->length = count($this->array);
    }
    
    
    function next(){
        $this->index++;
        if ($this->valid()) {
            $this->element = $this->array[$this->index];
        }
    }
    
    function rewind(){
        $this->index = -1;
        $this->next();
    }
    
    function current(){
        return $this->element;
    }

    function key(){
        return $this->index;
    }
    
    function valid(){
        return isset($this->array[$this->index]);
    }
}


$numbersArray = ['tahi', 'rua', 'toru', 'wha'];
$numbersIterator = new SimpleArrayIterator($numbersArray);

foreach ($numbersIterator as $i=>$n){
    echo "$i: $n" . PHP_EOL;
}
