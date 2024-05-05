<?php

use Tester\Assert;

$latte = new Latte\Engine;
#require "bootstrap.php";
//require "../index.php";
$latte->setTempDirectory('../temp');

class IndexTest extends Tester\TestCase
{

    public function setUp()
    {
        # Příprava

        echo "hello 2";
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
    function testRandomStuff(){
        Assert::same(0,0);
    }
}

(new IndexTest)->run();
