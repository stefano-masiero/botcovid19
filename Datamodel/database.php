<?php

class Database
{
    private static $connection;

    public static function getConnectionPDO()
    {
        if (!isset(self::$connection)) {
            try {
                $credentials = parse_ini_file('../../config.ini');
                self::$connection = new PDO($credentials['type'] . ":host=" . $credentials['host'] . ";dbname=" . $credentials['dbName'], $credentials['user'], $credentials['pass'], array(PDO::ATTR_PERSISTENT => true));
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                die();
            }
        }
        return self::$connection;
    }

    public static function getConnectionMysqli()
    {
        if (!isset(self::$connection)) {
            $credentials = parse_ini_file('../../config.ini');
            self::$connection = new mysqli($credentials['host'], $credentials['user'], $credentials['pass'], $credentials['dbName']);
        }
        if (self::$connection->connect_error) {
            die("Failed to connect to MySQL: (" . self::$connection->connect_errno . ") " . self::$connection->connect_error);
        }
        return self::$connection;
    }
}
