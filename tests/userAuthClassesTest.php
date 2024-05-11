<?php
############### autoload ###############

use Tester\Assert;

require_once "../vendor/autoload.php";

class AuthTest extends Tester\TestCase
/**
 * TEST: Basic database query test.
 *
 * @phpVersion 8.0
 */
/**
 *@dataProvider getData
 */
{
    private $Auth;
    public function setUp()
    {

        $this->Auth = new Auth;
    }

    public function tearDown()
    {
        // unsets variables after use
        unset($this->Auth);
        session_unset();
    }

    public function getCred()
    {
        return [["admin", "12345678", true], ["peppicek", "superheslo", false]];
    }
    /**
     *@dataProvider getCred
     */
    public function testLogin($username, $password, $exitCode)
    {
        $result = $this->Auth->login($username, $password);
        Assert::same($exitCode, $result['status']);

        Assert::type("bool", $result['status']);
        Assert::type("string", $result['msg']);
    }
    public function testRegister()
    {
    }
}

(new AuthTest)->run();
