<?php
namespace Shop\DataAccess;

use PDO;
use PDOException;
use Shop\Configuration;

class Database
{
    /* @var $databaseHandle PDO */
    private static $databaseHandle;

    function __construct()
    {
        $cfg = new Configuration();
        $this->config = $cfg->getSection("Database");
        $host = $this->config["host"];
        $username = $this->config["username"];
        $password = $this->config["password"];
        $dbname = $this->config["dbname"];
        $port = $this->config["port"];

        if (Database::$databaseHandle == null) {
            try {
                $dbh = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
                Database::$databaseHandle = $dbh;
            } catch (PDOException $ex) {
                echo "Sorry, this website is experiencing problems.";
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo $ex->getMessage();

                exit;
            }
        }
    }

    public function query($sql)
    {
        /* @var $dbh PDO */
        $dbh = Database::$databaseHandle;

        // TODO
    }
}