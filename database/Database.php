<?php

namespace database;

use config\Env;
use PDO;
use PDOException;

class Database
{
    private static $connection = null;

    public static function connect()
    {
        if (self::$connection === null) {
            try {
                $host = Env::get('DB_HOST');
                $dbname = Env::get('DB_NAME');
                $userName = Env::get('DB_USERNAME');
                $password = Env::get('DB_PASSWORD');

                self::$connection = new PDO("mysql:host=$host;dbname=$dbname", $userName, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch (PDOException $e) {
                die('database connection failed: ' . $e->getMessage());
            }

            return self::$connection;
        }

    }

}