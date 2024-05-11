<?php

############### autoload ###############
require_once "../vendor/autoload.php";

use Tester\Assert;


class userSessionClassesTest extends Tester\TestCase
{

    public $Session;
    public function setUp()
    {
        $this->Session = new Session;
        // disables header redirection
        $this->Session->isTest = true;
        // sets logout timeout to 1 so the test can run quicker
        $this->Session->timeoutAfter = 1;
    }

    public function testSetSession()
    {
        // Test setting Session
        $this->Session->setSession(123);
        Assert::true($_SESSION['auth']);
        Assert::equal($_SESSION['uid'], 123);

        // Test session overwrite
        $this->Session->setSession(1234);
        Assert::true($_SESSION['auth']);
        Assert::equal($_SESSION['uid'], 123);
    }
    public function testGetAuthStatus()
    {
        // resets session
        session_unset();
        // Test initial state
        Assert::false($this->Session->getAuthStatus());
        Assert::equal($this->Session->getUid(), -1);
    }

    public function testLogout()
    {
        // Test logout
        $this->Session->logout();
        Assert::false($this->Session->getAuthStatus());
    }
    public function testTimeout()
    {
        // Test timeout
        $this->Session->setSession(123);
        sleep(3); // simulate waiting for more than 3 seconds
        $this->Session->runCheck();
        Assert::false($this->Session->getAuthStatus());
    }
}

(new userSessionClassesTest())->run();
