<?php

namespace Database;

include_once "Config.php";

use Config\Config;

class Database extends Config
{
    public function get($table)
    {
        $query = $this->connect->query("SELECT * FROM " . $table . $this->condition);

        while($row=$query->fetch(\PDO::FETCH_ASSOC))
        {
            $this->array[] = $row;
        }

        return $this->array;
    }

    public function where($condition)
    {
        $this->condition = " WHERE " . $condition;
        return $this;
    }

    public function join()
    {
        return $this;
    }

    public function groupBy()
    {
        return $this;
    }

    public function limit()
    {
        return $this;
    }

    public function orderBy()
    {
        return $this;
    }
}