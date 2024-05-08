<?php

session_start();
class Session
// used variables:
// timeout, uid, auth

{
    public $timeout;
    public $uid;
    public $auth;
    public function __construct()
    {
        $this->runCheck();
    }
    public function runCheck()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
            if (isset($_SESSION['timeout'])) {
            } else {
                $_SESSION['timeout'] = time();
            }
            if (isset($_SESSION['uid'])) {
            } else {
                $_SESSION['uid'] = -1;
            }

            $this->timeout = $_SESSION['timeout'];
            $this->uid = $_SESSION['uid'];
            $this->auth = $_SESSION['auth'];

            $this->isTimedOut();
        } else {
            $_SESSION['auth'] = false;
        }
    }
    public function isTimedOut()
    {
        if (time() - $this->timeout < 1200) {
            $_SESSION['timeout'] = time();
        } else {
            $this->logout();
        }
    }
    public function setSession($uid)
    {
        if (isset($_SESSION['auth']) && !$_SESSION['auth']) {
            $_SESSION['auth'] = true;
            $_SESSION['uid'] = $uid;
            $this->runCheck();
        }
    }
    public function logout()
    {
        session_unset();
        header("location: /travel-blog/account/logout.php");
    }
    public function getAuthStatus()
    {
        if (isset($_SESSION['auth'])) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }
    public function getUid()
    {
        if (isset($_SESSION['uid'])) {
            return $_SESSION['uid'];
        } else {
            return -1;
        }
    }
}
