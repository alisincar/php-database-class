<?php

namespace src;

class Database extends Config
{
    protected $_select = '*';
    protected $_table = 'default';
    protected $_where = null;
    protected $_group;
    protected $_order;
    protected $_limit;
    protected $_query;

    public function query()
    {
        $this->_query = "SELECT $this->_select FROM  $this->_table  WHERE $this->_where $this->_group $this->_order $this->_limit";
        return $this;
    }

    public function table($table)
    {
        $this->_table = $table;
        return $this;
    }

    public function where($column, $operator = '=', $value = null, $equal = 'AND')
    {
        if ($this->_where == null) {
            $equal = '';
        }
        $this->_where .= $equal . ' ' . $column . ' ' . $operator . ' ' . $value;
        return $this;
    }

    public function orWhere($column, $operator = '=', $value = null)
    {
        $this->where($column, $operator, $value, $equal = 'OR');
        return $this;
    }

    public function join()
    {
        return $this;
    }

    public function groupBy($param)
    {
        if (is_array($param)) {
            $group = implode($param, ',');
        } else {
            $group = $param;
        }
        $this->_group = 'group by ' . $group;
        return $this;
    }

    public function select($param)
    {
        if (is_array($param)) {
            $this->_select = implode($param, ',');
        }
        return $this;
    }

    public function limit($param)
    {
        if (is_array($param)) {
            $limit = implode($param, ',');
        } else {
            $limit = $param;
        }
        $this->_limit = 'limit ' . $limit;
        return $this;
    }

    public function orderBy($param)
    {
        if (is_array($param)) {
            $order = implode($param, ',');
        } else {
            $order = $param;
        }
        $this->_order = 'order by ' . $order;
        return $this;
    }

    public function get()
    {
        $this->query();
        return $this->connect->query($this->_query)->fetch();
    }

    public function getAll()
    {
        $this->query();
        return $this->connect->query($this->_query)->fetchAll();
    }
}