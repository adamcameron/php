<?php

namespace me\adamcameron\kahlan\repository;

use me\adamcameron\kahlan\dao\JobDAO;
use me\adamcameron\kahlan\model\Job;

class JobRepository
{
    /** @var JobDAO  */
    public $dao;
    const SYNC_CUSTOMERS_JOB = 1;

    public function __construct(JobDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getLastRunForJob($id) : Job
    {
        $lastRun = $this->dao->getLastRunForJob($id);

        if (is_null($lastRun)) {
            $lastRun = '0000-00-00 00:00:00';
        }

        return new Job($id, $lastRun);
    }

    public function setLastRunForJob($id, $lastRun) : void
    {
        $this->dao->setLastRunForJob($id, $lastRun);
    }
}
