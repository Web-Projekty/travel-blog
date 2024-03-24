<?php

use Tester\Assert;

#require "bootstrap.php";
require "../index.php";
$latte->setTempDirectory('../temp');

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
}

(new IndexTest)->run();
