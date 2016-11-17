<?php

namespace doctrineTest\model;

class Numbers
{

    private $en;
    private $mi;
    private $id;

    public function setEn($en)
    {
        $this->en = $en;

        return $this;
    }

    public function getEn()
    {
        return $this->en;
    }

    public function setMi($mi)
    {
        $this->mi = $mi;

        return $this;
    }

    public function getMi()
    {
        return $this->mi;
    }

    public function getId()
    {
        return $this->id;
    }
}

