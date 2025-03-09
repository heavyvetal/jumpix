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

    public function insertRecord($data)
    {
        $query = "INSERT INTO $this->table (";

        $columns = array_keys($data);
        $values = array_values($data);

        foreach ($columns as $column) {
            $query .= "$column";

            if ($column != $columns[count($columns) - 1]){
                $query .= ",";
            }
        }

        $query .= ") VALUES (";

        foreach ($values as $key => $value) {
            $query .= "?";

            if ($key != count($values) - 1){
                $query .= ",";
            }
        }

        $query .= ")";

        $statement = $this->connection->prepare($query);
        $statement->execute($values);
    }

    public function selectRecord($column, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $column=? LIMIT 1";
        $statement = $this->connection->prepare($query);
        $statement->execute([$value]);
        $result_array = $statement->fetchAll($this->connection::FETCH_ASSOC);

        return $result_array[0];
    }

    public function selectAllRecords()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->connection->query($query);
        $result_array = $result->fetchAll($this->connection::FETCH_ASSOC);

        return $result_array;
    }

    public function updateRecord($data, $column, $desiredValue)
    {
        $values = array_values($data);
        $values[] = $desiredValue;

        $query = "UPDATE $this->table SET ";

        foreach ($data as $key => $value) {
            $query .= "$key=?";

            if ($key != array_key_last($data)){
                $query .= ",";
            }
        }

        $query .= " WHERE $column=?";

        $statement = $this->connection->prepare($query);
        $statement->execute($values);
    }

    public function deleteRecord($column, $value)
    {
        $query = "DELETE FROM $this->table WHERE $column=:value";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':value', $value, $this->connection::PARAM_INT);
        $statement->execute();
    }
}
