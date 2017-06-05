<?php

namespace me\adamcameron\db\dao;

use Doctrine\DBAL\Connection;
use me\adamcameron\db\model\Colour;

class ColoursDAO
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getColourById($id)
    {
        $dbColour = $this->connection->executeQuery('
            SELECT id, en, mi
            FROM colours
            WHERE id = :id
            ',
            ['id' => $id]
        )->fetchAll()[0];

        $colour = new Colour($dbColour['id'], $dbColour['en'], $dbColour['mi']);

        return $colour;
    }

    public function getColourByIdAndCloseConnection($id)
    {
        $colour = $this->getColourById($id);
        $this->connection->close();

        return $colour;
    }

    public function getColourByIdWithShortenedTimeout(int $id, int $timeout) : Colour
    {
        $stmt = $this->connection->prepare('SET SESSION WAIT_TIMEOUT = :timeout');
        $stmt->bindValue("timeout", $timeout, \PDO::PARAM_INT);
        $stmt->execute();

        $colour = $this->getColourById($id);

        return $colour;
    }
}
