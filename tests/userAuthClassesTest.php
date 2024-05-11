<?php
############### autoload ###############

require_once "../vendor/autoload.php";

use Tester\Assert;

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
    private $Database;
    public function setUp()
    {
        $this->Auth = new Auth;
        $this->Database = new Database;
    }

    public function tearDown()
    {
        // unsets variables after use
        unset($this->Auth);
        session_unset();
    }

    public function getCred()
    {
        return [["admin", "12345678", true], ["this_userWill_never-exist", "superheslo", false]];
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
    public function getAccounts()
    {
        return [
            ["Testing User 1", "testuser1@testingmail.test", "forTestingPurposes", "forTestingPurposes", true], // good
            ["Testing User 2", "testuser2@testingmail.test", "forTestingPurposes", "notMatchingPassword", false], // bad password
            ["Testing User 3", "existujicimail@existujicimail.mail", "forTestingPurposes", "forTestingPurposes", false], // email in use/username in use
            ["Testing User 4", "testuser4@testingmail", "forTestingPurposes", "forTestingPurposes", false], // several accounts with invalid email
            ["Testing User 5", "@testingmail.test", "forTestingPurposes", "forTestingPurposes", false],
            ["Testing User 6", "testuser6testingmail.test", "forTestingPurposes", "forTestingPurposes", false],
            ["Testing User 7", "testuser7@testingst", "forTestingPurposes", "forTestingPurposes", false],
            ["Testing User 8", "testuser8@tes#&@|€[|€^˘[Đ]][Đ][tiail.test", "forTestingPurposes", "forTestingPurposes", false],
            [null, null, null, null, null] // end test
        ];
    }
    public function testRegister()
    {
        $accounts = $this->getAccounts();
        while ($this->Database->rowExists("Users", "userEmail", "reserved@for.testing")) {
            $this->wait();
        }
        Tester\Environment::print("Succesfully reserved database for testing ^-^");

        foreach ($accounts as $account) {
            $name = $account[0];
            $email = $account[1];
            $password = $account[2];
            $Cpassword = $account[3];
            $exitCode = $account[4];
            if ($name != null) {
                // vytvoří účet pro rezervaci testování
                $result = $this->Auth->register("heslo", "heslo", "Rezervující účet", "reserved@for.testing");
                // vytvoření účtu pro simulaci existujícího účtu
                $result = $this->Auth->register("heslo", "heslo", "Účet pro simulaci existujícího účtu", "existujicimail@existujicimail.mail");

                //vytvoření právě testovaného účtu
                $result = $this->Auth->register($password, $Cpassword, $name, $email);

                Assert::same($exitCode, $result['status']);

                Assert::type("bool", $result['status']);
                Assert::type("string", $result['msg']);

                // cleanup
                $sql = "DELETE FROM `Users` WHERE `Users`.`userEmail` = '$email';";
                $this->Database->query($sql);
            } else {
                // smazání testovacího účtu
                $sql = "DELETE FROM `Users` WHERE `Users`.`userEmail` = 'existujicimail@existujicimail.mail';";
                $this->Database->query($sql);

                //smazání rezervujícího účtu
                $sql = "DELETE FROM `Users` WHERE `Users`.`userEmail` = 'reserved@for.testing';";
                $this->Database->query($sql);
                // reset AUTO_INCREMENT
                $lastId = $this->Database->getLastId(3) + 1;
                Tester\Environment::print("Setting last id to: " . $lastId);
                $sql = "ALTER TABLE Users AUTO_INCREMENT = $lastId;";
                $this->Database->query($sql);
            }
        }
    }
    public function wait()
    {
        Tester\Environment::print("Currently ongoing testing... wait for 15s");
        $msg = "";
        for ($i = 0; $i < 15; $i++) {
            $msg = $msg . ".";
            Tester\Environment::print($msg . $i + 1 . "s");
            sleep(1);
        }
    }
}


(new AuthTest)->run();
