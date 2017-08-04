<?php

namespace me\adamcameron\general\db\model;

class Colour
{
    public $id;
    public $en;
    public $mi;

    public function __construct($id, $en, $mi)
    {
        $this->id = $id;
        $this->en = $en;
        $this->mi = $mi;
    }

}
