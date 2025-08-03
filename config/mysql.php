<?php
class Config
{
    public $servername = "universal-db";
    public $username = "travelblog";
    public $password = "heslovymyslim";
    public $dbname = "travelblog";
}

### example of usage (when correctly implemented with composer) ###
/*
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
*/
