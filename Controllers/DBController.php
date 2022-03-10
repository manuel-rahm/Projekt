<?php

namespace JvJ\Controllers;

require_once("dbconfig.php");

/**
 * Class for connection to the database via PDO
 */

class DBController
{
    /**
     * Returns a connection object for the database
     * 
     * @return \PDO $connection PDO object to connect to the database
     */
    public static function getConnection()
    {
        try {
            $connection = new \PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
            return $connection;
        } catch (\PDOException $ex) {
            exit("Error: {$ex->getMessage()}");
        }
    }
}
