<?php

namespace app\Models;

class MySQLAdapter implements DatabaseAdapterInterface
{
    private $connection;
    private $table;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new \mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function setTable($table)
    {
        $this->table = $this->connection->real_escape_string($table);
    }

    public function insertRecord($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

        $statement = $this->connection->prepare($query);
        $types = str_repeat("s", count($data));
        $statement->bind_param($types, ...array_values($data));

        $statement->execute();
    }

    public function selectRecord($column, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $column=? LIMIT 1";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $value);

        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public function selectAllRecords()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->connection->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateRecord($data, $column, $desiredValue)
    {
        $setClause = implode("=?, ", array_keys($data)) . "=?";
        $query = "UPDATE $this->table SET $setClause WHERE $column=?";

        $statement = $this->connection->prepare($query);
        $types = str_repeat("s", count($data) + 1);
        $values = array_values($data);
        $values[] = $desiredValue;

        $statement->bind_param($types, ...$values);
        $statement->execute();
    }

    public function deleteRecord($column, $value)
    {
        $query = "DELETE FROM $this->table WHERE $column=?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $value);

        $statement->execute();
    }
}
