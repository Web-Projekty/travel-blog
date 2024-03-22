<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/articleClasses.php";


class articleClassesTest extends Tester\TestCase
{
    public function testItJustWorks()
    {
        Assert::same(0, 0);
    }

    public function isEmpty()
    {
    }
}

(new articleClassesTest())->run();
