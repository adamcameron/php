<?php

namespace me\adamcameron\kahlan\model;

/** @codeCoverageIgnore */
class Job
{
    public $id;
    public $lastRun;

    public function __construct($id, $lastRun)
    {
        $this->id = $id;
        $this->lastRun = $lastRun;
    }
}
