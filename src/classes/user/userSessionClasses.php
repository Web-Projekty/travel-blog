<?php

session_start();
class Session
// used variables:
// timeout, uid, auth
//
{
    public $timeout;
    public $uid;
    public $auth;
    public function __construct()
    {
        if (isset($_SESSION['timeout'])) {
        } else {
            $_SESSION['timeout'] = time();
        }
        if (isset($_SESSION['uid'])) {
        } else {
            $_SESSION['uid'] = -1;
        }
        if (isset($_SESSION['auth'])) {
        } else {
            $_SESSION['auth'] = false;
        }

        $this->timeout = $_SESSION['timeout'];
        $this->uid = $_SESSION['uid'];
        $this->auth =$_SESSION['auth'];

        $this->isTimedOut();
    }
    public function isTimedOut()
    {
        if (time() - $this->timeout > 600) {
            $_SESSION['timeout'] = time();
        }
    }
}
