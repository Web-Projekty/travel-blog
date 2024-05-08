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
    private $articleSearch;

    protected function setUp()
    {
        $this->articleSearch = new ArticleSearch();
    }

    public function testTypeInput()
    {
        $_GET['type'] = "title";
        Assert::same("title", $this->articleSearch->typeInput());

        $_GET['type'] = "author";
        Assert::same("author", $this->articleSearch->typeInput());

        unset($_GET['type']);
        Assert::same("title", $this->articleSearch->typeInput());
    }

    public function testFilterInput()
    {
        $_GET['orderBy'] = "datePublic DESC";
        Assert::same("datePublic DESC", $this->articleSearch->filterInput());

        unset($_GET['orderBy']);
        Assert::same("datePublic DESC", $this->articleSearch->filterInput());
    }

    public function testSearchInput()
    {
        $_GET['searchInput'] = "test";
        Assert::same("test", $this->articleSearch->searchInput());

        unset($_GET['searchInput']);
        Assert::same("", $this->articleSearch->searchInput());
    }
    public function testGetPages()
    {
        $_SERVER['PHP_SELF'] = "/test.php";

        // Test with no GET parameters
        $pages = $this->articleSearch->getPages();
        Assert::same([[null, null]], $pages);
    }
}
(new searchClassesTest())->run();
