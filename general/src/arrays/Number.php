<?php
class Number
{

    public $id;
    public $mi;
    public $en;

    public function __construct($id, $mi, $en)
    {
        $this->id = $id;
        $this->mi = $mi;
        $this->en = $en;
    }
}
