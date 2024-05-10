<?php

############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class userSessionClassesTest extends Tester\TestCase
{

    public $Session;
    public function setUp()
    {
        $this->Session = new Session;
        // disables redirection
        $this->Session->isTest = true;

        $this->Session->timeoutAfter = 1;
        //session_start();

    }

    public function testSession()
    {
        // Test initial state
        Assert::false($this->Session->getAuthStatus());
        Assert::equal($this->Session->getUid(), -1);

        // Test setting Session
        $this->Session->setSession(123);
        Assert::true($this->Session->getAuthStatus());
        Assert::equal($this->Session->getUid(), 123);
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
