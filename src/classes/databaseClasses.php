<?php
require_once "../vendor/autoload.php";
### a class for all database queries
class Database
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
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
}
