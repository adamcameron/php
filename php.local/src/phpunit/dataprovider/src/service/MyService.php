<?php

namespace me\adamcameron\dataprovider\service;

use me\adamcameron\dataprovider\repository\DatabaseRepository;
use me\adamcameron\dataprovider\repository\SocialMediaRepository;

class MyService
{
    private $dbRepository;
    private $smRepository;

    public function __construct(DatabaseRepository $dbRepository, SocialMediaRepository $smRepository)
    {
        $this->dbRepository = $dbRepository;
        $this->smRepository = $smRepository;
    }

    public function myMethod($someData)
    {
        if (array_key_exists('db', $someData)) {
            $this->dbRepository->doDbStuff($someData['db']);
        }
        if (array_key_exists('social', $someData)) {
            $this->smRepository->doSocialStuff($someData['social']);
        }
    }
}
