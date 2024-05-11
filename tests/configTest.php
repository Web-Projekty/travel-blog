<?php
############### autoload ###############
require_once "../vendor/autoload.php";
use Tester\Assert;
Tester\Environment::setup();

class ConfigTest extends Tester\TestCase
{
    /**
     * TEST: Basic database query test.
     *
     * @phpVersion 8.0
     */
    private $Config;
    public function setUp()
    {
        $this->Config = new Config;
    }

    function testConfig()
    {
        Assert::notNull($this->Config);

        Assert::true(!empty($this->Config->servername));
        Assert::true(!empty($this->Config->username));
        Assert::true(!empty($this->Config->password));
        Assert::true(!empty($this->Config->dbname));

        Assert::type("string", $this->Config->servername);
        Assert::type("string", $this->Config->username);
        Assert::type("string", $this->Config->password);
        Assert::type("string", $this->Config->dbname);
    }
}

(new ConfigTest)->run();
