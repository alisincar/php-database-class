<?php

namespace Config;

class Config
{
    const HOST = "127.0.0.1";
    const DB_NAME = "mvc_database";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_CHARSET = "utf8";

    protected $connect;

    protected $array;

    protected $condition;

    public function __construct()
    {
        $this->connect = new \PDO(
            "mysql:host=" . self::HOST .
            ";dbname=" . self::DB_NAME .
            ";charset=" . self::DB_CHARSET,
            self::DB_USER, self::DB_PASSWORD
        );
    }
}