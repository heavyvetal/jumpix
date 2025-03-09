<?php

namespace app\Models;

abstract class Model
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var DatabaseAdapterInterface
     */
    protected $connector;


    public function __construct(DatabaseAdapterInterface $connector)
    {
        $this->connector = $connector;

        if (isset($this->table)) {
            $this->connector->setTable($this->table);
        } else {
            throw new \Exception('Model table is not set');
        }
    }

    public function create(Array $data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }

        $this->connector->insertRecord($data);
    }

    public function findOne($column, $value)
    {
        return $this->connector->selectRecord($column, $value);
    }

    public function all()
    {
        return $this->connector->selectAllRecords();
    }

    public function edit($data, $column, $id)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }

        $this->connector->updateRecord($data, $column, $id);
    }

    public function delete($column, $value)
    {
        $this->connector->deleteRecord($column, $value);
    }
}
