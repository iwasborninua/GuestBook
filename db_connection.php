<?php
/**
 * Created by PhpStorm.
 * User: Nirvana
 * Date: 18.01.2018
 * Time: 23:47
 */

class DBConnection
{
    protected static $connection;

    public static function getConnection()
    {
        if (static::$connection === null) {
            static::$connection = static::createConnection();
        }

        return static::$connection;
    }

    protected static function createConnection()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=guestbook', "root", "");
        }

        catch (PDOException $e)
        {
            echo "Ошибка подключения к базе данных " . $e->getMessage();
            die();
        }

        return $db;
    }
}
