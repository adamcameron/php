<?php

namespace me\adamcameron\kahlan\dao;


use Doctrine\DBAL\Connection;

class JobDAO
{
    /** @var  Connection */
    public $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getLastRunForJob($id) : ?string
    {
        $sql = "SELECT lastRun FROM job WHERE id = :id";
        $values = ['id' => $id];
        $types = ['id' => \PDO::PARAM_INT];

        $statement = $this->dbConnection->executeQuery($sql, $values, $types);

        return $statement->fetchColumn(0);
    }

    public function setLastRunForJob($id, $lastRun) : void
    {
        $sql = "UPDATE job SET lastRun = :lastRun WHERE id = :id";
        $values = [
            'lastRun' => $lastRun,
            'id' => $id
        ];
        $types = [
            'lastRun' => \PDO::PARAM_STR,
            'id' => \PDO::PARAM_INT
        ];

        $this->dbConnection->executeUpdate($sql, $values, $types);
    }
}
