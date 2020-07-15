<?php

namespace me\adamcameron\general\tdd\fixingExistingTests;

class ThingRepository {

    public function getThing($id){
        $dao = DaoFactory::getThingDao();
        $dbData = $dao->getThing($id);

        return Thing::createFromArray($dbData);
    }
}