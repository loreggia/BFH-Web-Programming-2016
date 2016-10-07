<?php

class Database
{
    private $connection;
    private $config;

    function __construct($config)
    {
        $this->config = $config;
    }

    function __destruct()
    {
        if($this->connection){
            $this->connection->close();
        }
    }

    public function connect() {
        $connection = new mysqli($this->config["database"]["host"], $this->config["database"]["userName"], $this->config["database"]["password"], $this->config["database"]["name"]);

        if ($connection->connect_errno) {
            echo "Sorry, this website is experiencing problems.";

            echo "Error: Failed to make a MySQL connection, here is why: \n";
            echo "Errno: " . $connection->connect_errno . "\n";
            echo "Error: " . $connection->connect_error . "\n";

            exit;
        }

        $this->connection = $connection;
    }

    public function query($sql) {
        $connection = $this->connection;

        if (!$connection) {
            $this->connect();
        }

        if (!$result = $connection->query($sql)){
            echo "SQL error in:\n$sql\n";
            echo "$connection->errno\n";
            echo "$connection->error\n";

            exit;
        }

        $list = [];
        while ($row = $result->fetch_assoc()) {
            array_push($list, $row);
        }
        return $list;
    }
}