<?php

class BaseModel extends Database
{
    protected $connect;
    protected $table;
    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function All($table, $select = ['*'], $orderBys = [], $limit = 1000)
    {
        $columns = implode(', ', $select);
        $orderByString = implode(' ', $orderBys);
        if ($orderByString) {
            $sql = "SELECT ${columns} FROM ${table} ORDER BY ${orderByString} LIMIT ${limit}";
        } else {
            $sql = "SELECT ${columns} FROM ${table}  LIMIT ${limit}";
        }
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function find($table, $id)
    {
        $sql = "SELECT * FROM ${table} WHERE id = ${id} LIMIT 1";
        $query = $this->_query($sql);
        return  mysqli_fetch_assoc($query);
    }

    public function create($table, $data)
    {
        $column = implode(', ',  array_keys($data));
        $valueString = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));
        $newValue = implode(', ', $valueString);
        $sql = "INSERT INTO ${table}(${column}) VALUES(${newValue})";
        $this->_query($sql);
    }

    public function updateMain($table, $id, $data)
    {
        $dataSet = [];
        foreach ($data as $key => $value) {
            array_push($dataSet, "${key} = '" . $value . "' ");
        }
        $datesetString = implode(', ', $dataSet);
        $sql = "UPDATE ${table} SET ${datesetString}  WHERE id = ${id}";
        $this->_query($sql);
    }

    public function deleteMain($table, $id)
    {
        $sql = "DELETE FROM ${table} WHERE id = ${id}";
        $this->_query($sql);
        $data = [];
    }

    public function deleteCustom($sql)
    {
        $this->_query($sql);
    }

    public function getByQuery($sql)
    {
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function getQuery($sql)
    {
        $query = $this->_query($sql);
        return  mysqli_fetch_assoc($query);
    }

    public function getEmail($table, $email)
    {
        $sql = "SELECT * FROM admin WHERE email = '${email}'";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function detail($id)
    {
        $table = $this->table;
        $sql = "SELECT * FROM ${table} WHERE id = ${id}";
        $query = $this->_query($sql);
        return  mysqli_fetch_assoc($query);
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
