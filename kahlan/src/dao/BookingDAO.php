<?php

namespace me\adamcameron\kahlan\dao;

use Doctrine\DBAL\Connection;

/** @codeCoverageIgnore */
class BookingDAO
{
    public $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getBookingsSince(string $dateTime, int $records) : array
    {
        $sql = "
            SELECT
                id, emailAddress, created
            FROM
                booking
            WHERE
                created > :dateTime
            LIMIT
                :limit
        ";
        $values = ['dateTime' => $dateTime, 'limit' => $records];
        $types = ['dateTime' => \PDO::PARAM_STR, 'limit' => \PDO::PARAM_INT];

        $statement = $this->dbConnection->executeQuery($sql, $values, $types);

        return $statement->fetchAll();
    }
}
