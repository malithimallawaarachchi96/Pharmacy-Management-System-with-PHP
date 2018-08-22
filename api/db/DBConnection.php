<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcs
 * Date: 7/23/2018
 * Time: 8:55 AM
 */

class DBConnection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "malithi";
    private $port = 3306;
    private $database = "pharmacy";

    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->connection->connect_errno) {
            echo $this->connection->connect_error;
            die;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}