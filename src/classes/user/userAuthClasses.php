<?php
class Auth
{
    public $Session;
    public $Database;
    public function __construct()
    {
        $this->Session = new Session;
        $this->Database = new Database;
    }
    ### automated login method, returns true or false of based on status ###
    
    public function login($username, $password)
    {
        
        $sql = "SELECT password FROM `Users` WHERE `userName` = '$username'";
        $result = $this->Database->query($sql);
        $hash = $result->fetch_row();

        if (password_verify($password, $hash[0])) {
            echo "good";
            return true;
        } else {
            echo "bad";
            return false;
        }
    }
}
