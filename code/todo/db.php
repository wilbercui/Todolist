<?php

class Db
{
    public function __construct()
    {
        try {
            //解析config.ini文件
            $this->sql = '';
            $config = parse_ini_file(realpath(dirname(__FILE__) . '/config/config.ini'));
            //对mysqli类进行实例化
            $this->mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
            mysqli_set_charset($this->mysqli, 'utf8');
            if ($this->mysqli->connect_error) {
                die("连接失败: " . $this->mysqli->connect_error);
            }
        } catch (Exception $e) {        //捕获异常
            echo $e->getMessage();    //打印异常信息
        }
    }

    function select($table, $field = [])
    {
        if ($field) {
            $this->sql = 'SELECT ' . implode(',', $field) . ' FROM ' . $table;
        } else {
            $this->sql = 'SELECT * FROM ' . $table;
        }
        return $this;
    }

    function where($where)
    {
        $this->sql .= ' where';
        if (is_string($where)) {
            $this->sql .= ' ' . $where;
        } else if (is_array($where)) {
            foreach ($where as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        $this->sql .= ' `' . $k . '`="' . $v . '" ' . $key;
                    }
                } else {
                    if (count($where) == 1) {
                        $this->sql .= ' `' . $key . '`="' . $value . '"';
                    } else {
                        throw new Exception('ArrayIndexOutOfBoundsException');
                    }

                }
            }
            $pattern = '/and$|or$/';
            $this->sql = preg_replace($pattern, '', $this->sql);
        }

        return $this;
    }

    function groupBy($column)
    {
        if (is_string($column)) {
            $this->sql .= 'group by ' . $column;
        } elseif (is_array($column)) {
            $this->sql .= 'group by ' . implode(',', $column);
        }
        return $this;
    }

    function sql()
    {

        return $this->sql;

    }

    function update($table, $column = [])
    {
        $this->sql = 'UPDATE ' . $table . ' set ';
        foreach ($column as $k => $v) {
            $this->sql .= '`' . $k . '`="' . $v . '",';
        }
        $this->sql = substr($this->sql, 0, -1);
        return $this;
    }

    function del($table)
    {
        $this->sql = 'DELETE from ' . $table;
        return $this;
    }
    function todel()
    {
        $result = $this->mysqli->query((string)$this->sql);
        return $result;
    }
    function toUpdate()
    {
        $result = $this->mysqli->query((string)$this->sql);
        return $result;


    }
    function save($table,$column = [])
    {
        $sql='INSERT INTO '.$table.' ('.implode(',', array_keys($column)).') VALUES ('.implode(',', array_values($column)).')' ;
        $result = $this->mysqli->query((string)$sql);
        return $result;
    }
    function all()
    {
        $data = [];
        try {
            $result = $this->mysqli->query((string)$this->sql);
            if ($result->num_rows > 0) {
                // 输出数据
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
        } //捕获异常
        catch (Exception $e) {

            echo 'Message: ' . $e->getMessage();
        }

        return $data;
    }

}