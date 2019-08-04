<?php

namespace src;

use PDO;
use PDOException;

class Config
{
    const HOST = "localhost";
    const DB_NAME = "default";
    const DB_USER = "root";
    const DB_PASSWORD = "root";
    const DB_CHARSET = "utf8";
    const DB_PORT = "";
    const DB_SOCKET = "";
    const SHOW_ERRORS = true;
    const ERROR_LEVEL = E_ALL;

    protected $connect;

    protected $array;

    protected $condition;

    public function __construct()
    {
        //Hata raporlama
        ini_set('display_errors', self::SHOW_ERRORS);
        error_reporting(self::ERROR_LEVEL);

        try {
            $dsn = "mysql:dbname=" . self::DB_NAME . "; host=" . self::HOST.';'.self::DB_CHARSET;
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            );
            $this->connect = new PDO($dsn, self::DB_USER, self::DB_PASSWORD, $options);
            $this->connect->exec('SET NAMES UTF8');


        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
    }
}