<?php

namespace me\adamcameron\general\db\repository;

use me\adamcameron\general\db\dao\PeopleDAO;
use me\adamcameron\general\db\model\Person;

class PeopleRepository
{
    /** @var  PeopleDAO */
    private $dao;

    public function __construct(PeopleDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getNameByFirstChar(string $firstChar) : array
    {
        $rawNames = $this->dao->getNameByFirstChar($firstChar);

        $names = [];
        foreach ($rawNames as $name => $details) {
            $names[] = new Person($details['id'], $name, $details['rank'], $details['gender']);
        }
        return $names;
    }
}
