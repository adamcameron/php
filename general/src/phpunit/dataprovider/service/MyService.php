<?php

namespace me\adamcameron\general\phpunit\dataprovider\service;

use me\adamcameron\general\phpunit\dataprovider\repository\AuditRepository;
use me\adamcameron\general\phpunit\dataprovider\repository\DatabaseRepository;
use me\adamcameron\general\phpunit\dataprovider\repository\SocialMediaRepository;

class MyService
{
    private $dbRepository;
    private $smRepository;
    private $auditRepository;

    public function __construct(DatabaseRepository $dbRepository, SocialMediaRepository $smRepository, AuditRepository $auditRepository)
    {
        $this->dbRepository = $dbRepository;
        $this->smRepository = $smRepository;
        $this->auditRepository = $auditRepository;
    }

    public function myMethod($someData)
    {
        if (array_key_exists('db', $someData)) {
            $this->dbRepository->doDbStuff($someData['db']);
        }
        if (array_key_exists('social', $someData)) {
            $this->smRepository->doSocialStuff($someData['social']);
        }
        $this->auditRepository->doAuditStuff($someData);
    }
}
