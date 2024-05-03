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

        $sql = "SELECT password, idUsers FROM `Users` WHERE `userName` = '$username'";
        $result = $this->Database->query($sql);
        $row = $result->fetch_row();

        if (isset($row)) {
            $hash = $row[0];
            $uid = $row[1];
            if (password_verify($password, $hash)) {
                echo "good";
                $this->Session->setSession($uid);
                return true;
            } else {
                echo "bad password";
                return false;
            }
        } else {
            echo "user no exist";
            return false;
        }
    }
    public function register($username, $password, $cpassword)
    {
        if (!$this->Database->rowExists("Users", "userName", $username)) {
            echo $username;
            echo $password;
            echo $cpassword;
        } else {
            echo "user exists";
        }
    }
    public function getUserRole($uid)
    {
        $sql = "SELECT role FROM Users WHERE idUsers = $uid";
        $this->Database->query($sql);
    }
}
