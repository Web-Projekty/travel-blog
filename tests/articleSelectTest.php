<?php

use Tester\Assert;

#require "bootstrap.php";
require "..\src\articleSelect.php";

class ArticleDetailTest extends Tester\TestCase
{
    public function testStuff()
    {
        Assert::same(0,0);
    }

    public function isEmpty()
    {
    }
}
(new ArticleDetailTest)->run();