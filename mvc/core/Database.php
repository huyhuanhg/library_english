<?php


class Database
{
    private static $conn;
    const  HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB_NAME = 'library_english';

    public function __construct()
    {
        self::$conn = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB_NAME);
        mysqli_set_charset(self::$conn, 'utf8');
    }

    public static function _query($sql)
    {
        return mysqli_query(self::$conn, $sql);
    }
}