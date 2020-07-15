<?php

namespace me\adamcameron\general\tdd\fixingExistingTests;

class DaoFactory {

    public static function getThingDao() {
        return new ThingDao();
    }
}