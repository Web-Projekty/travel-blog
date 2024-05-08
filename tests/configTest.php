<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class ConfigTest extends Tester\TestCase
{

    public function setUp()
    {
        # Příprava
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
        Assert::same(0, 0);
    }
}

(new ConfigTest)->run();
