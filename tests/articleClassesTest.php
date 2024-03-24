<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";
require "../src/articleClasses.php";
require "../config/mysql.php";

class ArticleClassesTest extends Tester\TestCase
{
    public $Article = 0;
    function __construct()
    {
        $this->Article = new Articles;
    }

    function testGetTittleArray()
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
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);

        Assert::count($result->fetch_array()[0], $titles);
        $conn->close();
    }

    function getLoopArgs()
    {
        return [[-1], [0], [1], [2], [1654], [$this->Article->getLastId(1)]];
    }
    /**
     *@dataProvider getLoopArgs
     */
    function testGetArticleById($id)
    {
        ### checks for different cases of input ###
        $article = $this->Article->getArticleById($id);
        if (array_search($id, $this->Article->getIdArray()) != false) {
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
