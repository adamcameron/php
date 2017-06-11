<?php

namespace me\adamcameron\silex2\repository;

class NumberRepository
{
    private $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getNumberByIdAndLanguage($id, $lang)
    {
        return $this->connection->executeQuery(
            'SELECT'
        );
    }
}
