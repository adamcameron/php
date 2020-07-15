<?php

namespace me\adamcameron\general\tdd\fixingExistingTests;

class ThingRepositoryWithDaoDependency extends ThingRepository {

    private $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getThing($id){
        $dbData = $this->dao->getThing($id);

        return Thing::createFromArray($dbData);
    }
}