<?php

namespace Core;

use PDO;

class Database extends Config
{

    public $connection;
    protected $dsn;

    public function connect()
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }

        $this->dsn = "mysql:host=" . Config::HOST . ";port=" . Config::PORT . ";dbname=" . Config::DBNAME . ";charset=" . Config::CHARSET;
        $this->connection = new PDO($this->dsn, Config::DBUSER, Config::DBPASS, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        return $this->connection;
    }

    public function query($query, $params = [])
    {
        $stt = $this->connect()->prepare($query);
        $stt->execute($params);

        return $stt;
    }

    public function insert($tableName, $tableCol = [])
    {
        $tableColStr = implode(",", array_keys($tableCol));

        $strPara = implode(",", array_map(function ($item) {
            return ":" . $item;
        }, array_keys($tableCol)));

        $this->query("INSERT INTO {$tableName} ($tableColStr) VALUES ($strPara)", $tableCol);

        return $this->connection->lastInsertId();
    }
}
