<?php

############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class userSessionClassesTest extends Tester\TestCase
{
    public function testSession()
    {
        $session = new Session();
        
        // Test initial state
        Assert::false($session->getAuthStatus());
        Assert::equal($session->getUid(), -1);
        
        // Test setting session
        $session->setSession(123);
        Assert::true($session->getAuthStatus());
        Assert::equal($session->getUid(), 123);
        
        // Test logout
        $session->logout();
        Assert::false($session->getAuthStatus());

        // Test timeout
        $session->setSession(123);
        sleep(1201); // simulate waiting for more than 20 minutes
        $session->runCheck();
        Assert::false($session->getAuthStatus());
    }
}

(new userSessionClassesTest())->run();
?>