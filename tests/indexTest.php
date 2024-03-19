<?php

use Tester\Assert;

#require "bootstrap.php";
require "../index.php";

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
