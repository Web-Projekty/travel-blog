<?php
require_once "../vendor/autoload.php";
class Auth
{
    public $Session;
    public function __construct()
    {
        $this->Session = new Session;
    }
    public function login($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
    }
}
