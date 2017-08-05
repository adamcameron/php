<?php

namespace me\adamcameron\kahlan\dao;

use Doctrine\DBAL\Connection;

/** @codeCoverageIgnore */
class CustomerDAO
{
    public $dbConnection;

    public function __construct(Connection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getCustomerByEmailAddress(string $emailAddress) : ?array
    {
        $sql = "
            SELECT
                bookingId, emailAddress, previousBookingId 
            FROM
                customer
            WHERE
                emailAddress = :emailAddress
            LIMIT
                1
        ";
        $values = ['emailAddress' => $emailAddress];
        $types = ['dateTime' => \PDO::PARAM_STR];

        $statement = $this->dbConnection->executeQuery($sql, $values, $types);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }
        return null;
    }

    public function saveCustomerByEmail($emailAddress, $bookingId, $previousBookingId) : int
    {
        $sql = "
            INSERT INTO
                customer (emailAddress, bookingId, previousBookingId)
            VALUES
                (:emailAddress, :bookingId, :previousBookingId)
            ON DUPLICATE KEY UPDATE
                emailAddress = :emailAddress,
                bookingId = :bookingId,
                previousBookingId = :previousBookingId
        ";
        $values = [
            'emailAddress' => $emailAddress,
            'bookingId' => $bookingId,
            'previousBookingId' => $previousBookingId
        ];
        $types = [
            'emailAddress' => \PDO::PARAM_STR,
            'bookingId' => \PDO::PARAM_INT,
            'previousBookingId' => \PDO::PARAM_INT
        ];
        $rowsAffected = $this->dbConnection->executeUpdate($sql, $values, $types);

        return $rowsAffected;
    }
}
