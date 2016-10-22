<?php

class Database
{
    /* @var $databaseHandle PDO */
    private static $databaseHandle;

    function __construct()
    {
        $cfg = new Configuration();
        $section = $cfg->getSection("Database");
        $host = $section["host"];
        $username = $section["username"];
        $password = $section["password"];
        $dbname = $section["dbname"];
        $port = $section["port"];

        if (Database::$databaseHandle == null) {
            try {
                $dbh = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                Database::$databaseHandle = $dbh;
            } catch (PDOException $ex) {
                $this->handleException($ex);
            }
        }
    }

    private function handleException($ex)
    {
        echo "Sorry, this website is experiencing problems.\nError: Failed to make a MySQL connection, here is why:\n" . $ex->getMessage();
        exit;
    }

    /* @return array */
    public function queryAssoc($sql, $params = null)
    {
        return $this->query($sql, $params, PDO::FETCH_ASSOC);
    }

    private function query($sql, $params, $fetchMode, $className = null, $constructorParameters = null)
    {
        try {
            /* @var $dbh PDO */
            $dbh = Database::$databaseHandle;

            $sth = $dbh->prepare($sql);

            if ($params) {
                $sth->execute($params);
            } else {
                $sth->execute();
            }

            if ($constructorParameters) {
                $sth->setFetchMode($fetchMode, $className, $constructorParameters);
            } else if ($className) {
                $sth->setFetchMode($fetchMode, $className);
            } else {
                $sth->setFetchMode($fetchMode);
            }

            $result = [];

            while ($row = $sth->fetch()) {
                array_push($result, $row);
            }

            return $result;
        } catch (PDOException $ex) {
            $this->handleException($ex);
        }
    }

    /* @return array */
    public function queryClass($sql, $params, $className)
    {
        return $this->query($sql, $params, PDO::FETCH_CLASS, $className);
    }

    public function execute($sql, $params = null)
    {
        try {
            $dbh = Database::$databaseHandle;
            $sth = $dbh->prepare($sql);
            return $sth->execute($params);
        } catch (PDOException $ex) {
            $this->handleException($ex);
        }
    }
}