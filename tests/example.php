<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

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
