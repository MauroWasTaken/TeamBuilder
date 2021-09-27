<?php

class DB
{
    private function getDB()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=teambuilder", $username, $password);
            echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    private function executeQuery(string $query, array $params)
    {
        $conn = $this->getDB();
        if ($conn != null) {
            $statement = $conn->prepare($query);
            $statement->execute($params);
            return $statement;
        }
        return null;

    }

    public function selectMany(string $query, array $params)
    {
        $statement = $this->executeQuery($query, $params);
        if ($statement  != null) {
            return $statement->fetchAll();
        } else {
            return null;
        }
    }

    public function selectOne(string $query, array $params)
    {
        $statement = $this->executeQuery($query, $params);
        if ($statement  != null) {
            return $statement->fetch();
        } else {
            return null;
        }
    }

    public function insert(string $query, array $params)
    {
        $conn = $this->getDB();
        if ($conn != null) {
            $statement = $conn->prepare($query);
            $statement->execute($params);
            return $conn->lastInsertId();
        }
        return null;
    }

    public function execute(string $query, array $params)
    {
        $statement = $this->executeQuery($query, $params);
        if ($statement  != null) {
            return $statement->rowCount();
        } else {
            return null;
        }
    }
}