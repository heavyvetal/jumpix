<?php

namespace app\Models;

class PDOAdapter implements DatabaseAdapterInterface
{
    private $connection;
    private $table;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    private function _executeQuery($query, $params = [], $fetch = true)
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $fetch ? $statement->fetchAll($this->connection::FETCH_ASSOC) : null;
        } catch (\PDOException $e) {
            throw new \Exception("Database error: " . $e->getMessage());
        }
    }

    public function insertRecord($data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

        $this->_executeQuery($query, array_values($data), false);
    }

    public function selectRecord($column, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $column=? LIMIT 1";
        $result = $this->_executeQuery($query, [$value]);

        return $result[0] ?? null;
    }

    public function selectAllRecords()
    {
        $query = "SELECT * FROM $this->table";
        return $this->_executeQuery($query);
    }

    public function updateRecord($data, $column, $desiredValue)
    {
        $setClause = implode('=?, ', array_keys($data)) . '=?';
        $query = "UPDATE $this->table SET $setClause WHERE $column=?";

        $params = array_merge(array_values($data), [$desiredValue]);
        $this->_executeQuery($query, $params, false);
    }

    public function deleteRecord($column, $value)
    {
        $query = "DELETE FROM $this->table WHERE $column=?";
        $this->_executeQuery($query, [$value], false);
    }
}
