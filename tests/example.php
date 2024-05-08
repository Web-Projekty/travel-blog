<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class IndexTest extends Tester\TestCase
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
    function testTestRun()
    {
        Assert::same(0, 0);
    }
}

(new IndexTest)->run();
