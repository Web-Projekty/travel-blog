<?php

use Tester\Assert;

#require "bootstrap.php";
require "../articleDetail.php";
$latte->setTempDirectory('../temp');

Class ArticleDetailTest extends Tester\TestCase
{
    public function ItJustWorks()
    {

    }
    
    public function isEmpty()
    {
        Assert::isEmpty();

    }
}

(new ArticleDetailTest())->run();
?>