<?php
############### autoload ###############
require_once "../vendor/autoload.php";

use Tester\Assert;


class ArticleClassesTest extends Tester\TestCase
{
    /**
     * TEST: Basic database query test.
     *
     * @phpVersion 8.0
     */

    public $Article;
    public $Database;
    function __construct()
    {
        $this->Article = new Articles;
        $this->Database = new Database(true);
        $this->Database->isTest = true;
        echo $this->Database->isTest;
    }

    function testGetTitleArray()
    {
        $titles = $this->Article->getTitleArray();
        ### tests for data type ###
        Assert::type("array", $titles);

        ### tests for empty fields ###
        foreach ($titles as $title) {
            Assert::notNull($title[0]);
            Assert::notNull($title[1]);
        }

        ### checks if funciton selected all titles ###
        $sql = "SELECT COUNT(title) FROM `Articles` ";


        $result = $this->Database->query($sql);

        Assert::count($result->fetch_array()[0], $titles);
    }

    function getLoopArgs()
    {
        return [[-1], [0], [1], [2], [1654], [intval($this->Database->getLastId(1))]];
    }
    /**
     *@dataProvider getLoopArgs
     */
    function testGetArticleById($id)
    {
        ### checks for different cases of input ###
        $article = $this->Article->getArticleById($id);
        if (is_int(array_search($id, $this->Database->getIdArray(1)))) {
            Assert::true($article['succesfull']);
            foreach ($article as $key) {
                Assert::notNull($key);
            }
        } else {
            Assert::false($article['succesfull']);
        }
    }
}

(new ArticleClassesTest())->run();
