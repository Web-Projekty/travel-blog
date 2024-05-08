<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class ConfigTest extends Tester\TestCase
{
    private $Config;
    public function setUp()
    {
        $this->Config = new Config;
    }

    public function tearDown()
    {
        # Úklid
    }

    /*  public function getLoopArgs()
    {
        return [
            #array hodnot
        ];
    }*/

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
