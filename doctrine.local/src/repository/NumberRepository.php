<?php

namespace doctrineTest\repository;

use Doctrine\DBAL\Connection;
use doctrineTest\factory\ConnectionFactory;

class NumberRepository {

    /** @var Connection  */
	private $connection;
	private $parameterHelper;

	function __construct(ConnectionFactory $connectionFactory, $parameterHelper) {
		$this->connection = $connectionFactory->createConnection();
		$this->parameterHelper = $parameterHelper;
	}

	function getAll(){
		$numbers = $this->connection->query("SELECT * FROM numbers");

		return $numbers;
	}

	function getSubset($maxId){
		$preparedStatement = $this->connection->prepare("SELECT * FROM numbers WHERE id <= :upperThreshold");
		$preparedStatement->execute(["upperThreshold" => $maxId]);

		$numbers = $preparedStatement->fetchAll();

		return $numbers;
	}

	function getSubsetWithBindParam($maxId) {
		$preparedStatement = $this->connection->prepare("SELECT * FROM numbers WHERE id <= :upperThreshold");
		$preparedStatement->bindParam(":upperThreshold", $maxId, \PDO::PARAM_INT);

		$preparedStatement->execute();
		$numbers = $preparedStatement->fetchAll();

		return $numbers;
	}

	function getSubsetWithBindValue($maxId) {
		$preparedStatement = $this->connection->prepare("SELECT * FROM numbers WHERE id <= :upperThreshold");
		$preparedStatement->bindValue(":upperThreshold", $maxId, \PDO::PARAM_INT);

		$preparedStatement->execute();
		$numbers = $preparedStatement->fetchAll();

		return $numbers;
	}

	function getSubsetWithParamList($ids) {
		$parameterHelper = $this->parameterHelper;
		$paramPlaceholders = $parameterHelper::createParameterListForSqlStatement($ids);
		$sqlStatement = "SELECT * FROM numbers WHERE id IN ($paramPlaceholders)";

		$preparedStatement = $this->connection->prepare($sqlStatement);
		$preparedStatement->execute($ids);
		$numbers = $preparedStatement->fetchAll();

		return $numbers;
	}

	function getThingsWithId($id) {
		$preparedStatement = $this->connection->prepare("call getThingsById(:id)");
		$preparedStatement->execute(["id" => $id]);

		$number = $preparedStatement->fetchAll();
		$preparedStatement->nextRowset();

		$colour = $preparedStatement->fetchAll();
		$preparedStatement->nextRowset();

		$day = $preparedStatement->fetchAll();

		return [
			"number" => $number,
			"colour" => $colour,
			"day" => $day
		];
	}

	function getNumbersUsingTransaction($id) {
		$paramArray = ["id" => $id];

		$this->connection->beginTransaction();
		$deleteStatement = $this->connection->prepare("DELETE FROM numbers WHERE id=:id");
		$deleteStatement->execute($paramArray);

		$selectStatement = $this->connection->prepare("SELECT * FROM numbers WHERE id <= (:id + 1)");
		$selectStatement->execute($paramArray);
		$withinTransaction = $selectStatement->fetchAll();

		$this->connection->rollBack();

		$selectStatement->execute($paramArray);
		$afterRollback = $selectStatement->fetchAll();

		return[
			"withinTransaction" => $withinTransaction,
			"afterRollback" => $afterRollback
		];
	}
}
