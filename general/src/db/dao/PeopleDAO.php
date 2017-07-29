<?php

namespace me\adamcameron\general\db\dao;

use Doctrine\DBAL\Connection;

class PeopleDAO
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getNameByFirstChar(string $char) : array
    {
        $sql = "
            SELECT
                firstName, id, rank, gender
            FROM
                people
            WHERE
                firstName like :firstChar
            ORDER BY
                rank, firstName, gender
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':firstChar' => "$char%"]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC|\PDO::FETCH_UNIQUE);

        return $result;

    }
}