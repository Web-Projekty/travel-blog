<?php

### a class for all database queries
class Database
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public bool $isTest;
    public function __construct()
    {
        $Config = new Config;
        $this->servername = $Config->servername;
        $this->username = $Config->username;
        $this->password = $Config->password;
        $this->dbname = $Config->dbname;
        $this->isTest = false;
    }
    public function connect()
    {
        var_dump($this->isTest);
        if ($this->isTest) {
            if (!file_exists('../src/db/test.db')) {
                $conn = new PDO('sqlite:../src/db/test.db');
                $sql = file_get_contents('../src/sql/TravelBlog.sql');
                $conn->exec($sql);
            } else {
                $conn = new PDO('sqlite:../src/db/test.db');
            }            
        } else {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);    
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        }
        
        return $conn;
    }
    public function query($sql)
    {
        $conn = $this->connect();
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
    public function getLastId($database)
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
        switch ($db) {
            case 1:
                $dbName = "Articles";
                break;
            case 2:
                $dbName = "Destinations";
                break;
            case 3:
                $dbName = "Users";
                break;
            default:
                return false;
        }
        $sql = "ALTER TABLE $dbName AUTO_INCREMENT = $lastId;";
        $this->query($sql);
        if ($this->isTest) {
            Tester\Environment::print("Setting last id to: " . $lastId);
        }
    }
    ### returns count of rows in specified database ###
    public function countRows($database)
    {
        ### set sql for specific database ###
        switch ($database) {
            case 1:
                $sql = "SELECT COUNT(title) FROM `Articles`";
                break;
            case 2:
                $sql = "SELECT COUNT(title) FROM `Destinations`";
                break;
            case 3:
                $sql = "SELECT COUNT(title) FROM `Users`";
                break;
            default:
                return false;
        }

        $result = $this->query($sql);

        return $result->fetch_array()[0];
    }
    ### fetches the last id used ###

    ### get all ids from any database ###
    public function getIdArray(int $database)
    {
        switch ($database) {
            case 1:
                $sql = "SELECT idArticles FROM `Articles`";
                $idName = "idArticles";
                break;
            case 2:
                $sql = "SELECT idDestination FROM `Destinations`";
                $idName = "idDestination";
                break;
            case 3:
                $sql = "SELECT idUsers FROM `Users`";
                $idName = "idUsers";
                break;
            default:
                return false;
        }

        $result = $this->query($sql);

        ### adds values to array $ids
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $ids[$i] = intval($row[$idName]);
                $i++;
            }
            return $ids;
        }
    }
    public function getRowById(int $db, int $id, string $columnName)
    {
        switch ($db) {
            case 1:
                $sql = "SELECT $columnName FROM Articles WHERE idArticles = $id";
                break;
            case 2:
                $sql = "SELECT $columnName FROM Destinations WHERE idDestination = $id";
                break;
            case 3:
                $sql = "SELECT $columnName FROM Users WHERE idUsers = $id";
                break;
            default:
                return false;
        }
        return $this->query($sql);
    }
}
