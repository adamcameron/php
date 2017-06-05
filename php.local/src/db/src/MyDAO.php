<?php

namespace me\adamcameron\db;

use Doctrine\DBAL\Connection;

class MyDAO
{

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function selectFirstFour()
    {
        return $this->connection->executeQuery('
            SELECT *
            FROM numbers
            WHERE id <= 4
            ORDER BY id
        ')->fetchAll();
    }

    public function selectLastFour()
    {
        $result = $this->connection->executeQuery('
            SELECT *
            FROM numbers
            WHERE id >= 7
            ORDER BY id
        ');

        $this->connection->close();

        return $result->fetchAll();
    }
}
