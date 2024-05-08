<?php

############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/classes/searchClasses.php";

class searchClassesTest extends Tester\TestCase
{
    /**
 * TEST: Basic database query test.
 *
 * @phpVersion 8.0
 */
    private $ArticleSearch;

    protected function setUp()
    {
        $this->ArticleSearch = new ArticleSearch();
    }

    public function testTypeInput()
    {
        $_GET['type'] = "title";
        Assert::same("title", $this->ArticleSearch->typeInput());

        $_GET['type'] = "author";
        Assert::same("author", $this->ArticleSearch->typeInput());

        unset($_GET['type']);
        Assert::same("title", $this->ArticleSearch->typeInput());
    }

    public function testFilterInput()
    {
        $_GET['orderBy'] = "datePublic DESC";
        Assert::same("datePublic DESC", $this->ArticleSearch->filterInput());

        unset($_GET['orderBy']);
        Assert::same("datePublic DESC", $this->ArticleSearch->filterInput());
    }

    public function testSearchInput()
    {
        $_GET['searchInput'] = "test";
        Assert::same("test", $this->ArticleSearch->searchInput());

        unset($_GET['searchInput']);
        Assert::same("", $this->ArticleSearch->searchInput());
    }
    public function testGetPages()
    {
        $_SERVER['PHP_SELF'] = "/test.php";

        // Test with no GET parameters
        $pages = $this->ArticleSearch->getPages();
        Assert::same([[null, null]], $pages);
    }
}
(new searchClassesTest())->run();
