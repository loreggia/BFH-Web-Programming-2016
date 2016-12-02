<?php

class Database
{
    /* @var $databaseHandle PDO */
    private $databaseHandle;

    function __construct()
    {
        $cfg = new Configuration();
        $section = $cfg->getSection("Database");
        $host = $section["host"];
        $username = $section["username"];
        $password = $section["password"];
        $dbname = $section["dbname"];
        $port = $section["port"];

        if ($this->databaseHandle == null) {
            try {
                $dbh = new PDO("mysql:host=$host:$port;dbname=$dbname;charset=utf8", $username, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->databaseHandle = $dbh;
            } catch (PDOException $ex) {
                $this->handleException($ex);
            }
        }
    }

    private function handleException(PDOException $ex)
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
            $dbh = $this->databaseHandle;

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
            return [];
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
            $dbh = $this->databaseHandle;
            $sth = $dbh->prepare($sql);
            return $sth->execute($params);
        } catch (PDOException $ex) {
            $this->handleException($ex);
            return false;
        }
    }

    public function getLastInsertId()
    {
        try {
            return $this->databaseHandle->lastInsertId();
        } catch (PDOException $ex) {
            $this->handleException($ex);
            return false;
        }
    }
}