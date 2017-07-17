<?php

namespace me\adamcameron\silex2\repository;

use me\adamcameron\silex2\exception\DatabaseException;
use me\adamcameron\silex2\model\Number;

class NumberRepository
{
    private $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getNumberByIdAndLanguage($id, $lang)
    {
        $statement = $this->connection->prepare(
            "SELECT id, $lang AS name FROM numbers WHERE id = :id"
        );
        $success = $statement->execute(['id' => $id]);

        if (!$success) {
            throw new DatabaseException(
                'A database exception occurred',
                $this->connection->errorCode()
            );
        }

        $result = $statement->fetchAll();

        if (!count($result)) {
            return null;
        }
        return new Number($result[0]['id'], $result[0]['name']);
    }
}
