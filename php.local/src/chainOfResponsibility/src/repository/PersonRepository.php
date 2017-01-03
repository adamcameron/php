<?php

namespace me\adamcameron\cor\repository;

use me\adamcameron\cor\service\LoggingService;

class PersonRepository {

    private $data = [
        [],
        ['firstName' => 'Tui', 'lastName' => 'Tahi'],
        ['firstName' => 'Rewi', 'lastName' => 'Rua'],
        ['firstName' => 'Tama', 'lastName' => 'Toru'],
        ['firstName' => 'Whina', 'lastName' => 'Wha']
    ];
    private $logger;

    public function __construct(LoggingService $logger)
    {
        $this->logger = $logger;
    }

    public function getById($id) {
        if (array_key_exists($id, $this->data)){
            $this->logger->info("Database hit for $id");
            return $this->data[$id];
        }
        $this->logger->info("Database miss for $id");
        return [];
    }
}
