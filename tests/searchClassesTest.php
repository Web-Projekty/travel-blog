<?php
/*
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/searchClasses.php";
require "../config/mysql.php";

class searchClassesTest extends Tester\TestCase
{
    public $articleSearch;

    protected function setUp(): void
    {
        $this->articleSearch = new ArticleSearch();
    }

    public function testGetArticleList()
    {
        $result = $this->articleSearch->getArticleList(1, "datePublic DESC", "šumava");
        Assert::isArray($result);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testFilterInput()
    {
        $_GET['orderBy'] = "datePublic DESC";
        $result = $this->articleSearch->filterInput();
        $this->assertEquals("datePublic DESC", $result);
    }

    public function testSearchInput()
    {
        $_GET['searchInput'] = "šumava";
        $result = $this->articleSearch->searchInput();
        $this->assertEquals("šumava", $result);
    }

    public function testGetPages()
    {
        $result = $this->articleSearch->getPages();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
(new searchClassesTest())->run();*/

use Tester\Assert;

$latte = new Latte\Engine;
#require "bootstrap.php";

$latte->setTempDirectory('../temp');

class searchClassesTest extends Tester\TestCase
{

    public function setUp()
    {
        echo "hello1";
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
    function testRandomStuff2(){
        Assert::false(false);
    }
}

(new searchClassesTest)->run();
