<?php


class Database
{
    private $conn;
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB_NAME = 'myshop';

    public function __construct()
    {
        $this->conn = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB_NAME);
        mysqli_set_charset($this->conn, 'utf8');
    }

    public function _query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }
}