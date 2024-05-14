<?php

### a class for all database queries
class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $isTest = false;
    public function __construct()
    {
        $Config = new Config;
        $this->servername = $Config->servername;
        $this->username = $Config->username;
        $this->password = $Config->password;
        $this->dbname = $Config->dbname;
    }
    public function connect()
    {

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function query($sql)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    public function rowExists(string $db, string $column, string $row)
    {
        $sql = "SELECT $column FROM $db WHERE $column = '$row'";
        $result = $this->query($sql);

        return !empty($result->fetch_column());
    }
    function getLastId($database)
    {
        ### chooses the right db and connects to mysql ###
        switch ($database) {
            case 1:
                $sql = "SELECT * FROM `Articles` ORDER BY `idArticles` DESC";
                break;
            case 2:
                $sql = "SELECT * FROM `Destinations` ORDER BY `idDestination` DESC";
                break;
            case 3:
                $sql = "SELECT * FROM `Users` ORDER BY `idUsers` DESC";
                break;
            default:
                return false;
        }

        ### executes sql query ###
        $result = $this->query($sql);
        //var_dump($result->fetch_array());
        $array = $result->fetch_array();
        return $array[0];
    }
    public function resetIncrement($db)
    {
        $lastId = $this->getLastId($db) + 1;
        $sql = "ALTER TABLE Users AUTO_INCREMENT = $lastId;";
        $this->query($sql);
        if ($this->isTest) {
            Tester\Environment::print("Setting last id to: " . $lastId);
        }
    }
}
