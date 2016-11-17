<?php

namespace doctrineTest\model;

class Person
{
    private $firstname;
    private $lastname;
    private $id;

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getId()
    {
        return $this->id;
    }
}
