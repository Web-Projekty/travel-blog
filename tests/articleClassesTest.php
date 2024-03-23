<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/articleClasses.php";
#include("../src/articleClasses.php");

class articleClassesTest extends Tester\TestCase
{
    public $Article = 0;
    function __construct()
    {
        $this->Article = new Articles;
    }

    public function testGetTittleArray()
    {
        $titles = $this->Article->getTitleArray();
        Assert::type("array",$titles);
        
    }
}

(new articleClassesTest())->run();
