<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/searchClasses.php";
require "../config/mysql.php";

class searchClassesTest extends Tester\TestCase
{
    private $articleSearch;

    protected function setUp(): void
    {
        $this->articleSearch = new ArticleSearch();
    }

    public function testGetArticleList()
    {
        $result = $this->articleSearch->getArticleList(1, "datePublic DESC", "šumava");
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
?>