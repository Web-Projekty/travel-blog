<?php
############### autoload ###############
require_once "../vendor/autoload.php";
use Tester\Assert;
Tester\Environment::setup();

class IndexTest extends Tester\TestCase
/**
 * TEST: Basic database query test.
 * 
 * @phpVersion 8.0
 */
/**
 *@dataProvider getData
 */
{

    public function setUp()
    {
        # Příprava
    }

    public function tearDown()
    {
        # Úklid
    }

    public function getLoopArgs()
    {
        return [
            #array hodnot
        ];
    }

    function testTestRun()
    {
        Assert::same(0, 0);
    }
}

(new IndexTest)->run();
