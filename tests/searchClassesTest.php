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

    function getRandomString()
    {
        return [["apple"], ["banana"], ["cat"], ["dog"], ["sun"], ["moon"], ["book"], ["pen"], ["red"], ["blue"], ["happy"], ["sad"], ["tree"], ["flower"], ["ocean"], ["river"], ["mountain"], ["valley"], ["star"], ["planet"]];
    }
    /**
     *@dataProvider getRandomString
     */
    public function testTypeInput($randomString)
    {

        $_GET['type'] = $randomString;
        Assert::same($randomString, $this->ArticleSearch->typeInput());

        unset($_GET['type']);
        Assert::same("title", $this->ArticleSearch->typeInput());

        Assert::notNull($this->ArticleSearch->typeInput());

        Assert::type("string", $this->ArticleSearch->typeInput());
    }
    /**
     *@dataProvider getRandomString
     */
    public function testFilterInput($randomString)
    {
        $_GET['orderBy'] = $randomString;
        Assert::same($randomString, $this->ArticleSearch->filterInput());

        unset($_GET['orderBy']);
        Assert::same("datePublic DESC", $this->ArticleSearch->filterInput());

        Assert::notNull($this->ArticleSearch->filterInput());

        Assert::type("string", $this->ArticleSearch->filterInput());
    }
    /**
     *@dataProvider getRandomString
     */
    public function testSearchInput($randomString)
    {
        $_GET['searchInput'] = $randomString;
        Assert::same($randomString, $this->ArticleSearch->searchInput());

        unset($_GET['searchInput']);
        Assert::same("", $this->ArticleSearch->searchInput());

        Assert::true(empty($this->ArticleSearch->searchInput()));

        Assert::type("string", $this->ArticleSearch->searchInput());
    }
    function getRandomNumbers()
    {
        for ($i = 0; $i < 9253; $i++) {
            $nums[$i] = [rand(-1000, 1000), rand(-1000, 1000)];
        }
        return $nums;
    }
    /**
     *@dataProvider getRandomNumbers
     */

    public function testGetPages($counter, $pagesPerList)
    {
        $_SERVER['PHP_SELF'] = "/test.php";

        // Test with no GET parameters
        Assert::same([[null, null]], $this->ArticleSearch->getPages());

        // Test with GET parameters
        Assert::same([[null, null]], $this->ArticleSearch->getPages());
        //$_GET[]

        // echo $this->ArticleSearch->counter = $counter;
        //echo $this->ArticleSearch->pagesPerList = $pagesPerList;
        //var_dump($this->ArticleSearch->getPages());
        if (ceil($this->ArticleSearch->counter / $this->ArticleSearch->articlesPerPage) >= 1) {
            Assert::count(ceil($this->ArticleSearch->counter / $this->ArticleSearch->articlesPerPage), $this->ArticleSearch->getPages());
        } else {
            Assert::count(1, $this->ArticleSearch->getPages());
        }
    }
}
(new searchClassesTest())->run();
