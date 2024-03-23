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

    public function testGetTittleArray()
    {
        $titles = $this->Article->getTitleArray();
        ### tests for data type ###
        Assert::type("array", $titles);

        ### tests for empty fields ###
        foreach ($titles as $title) {
            Assert::notNull($title);
        }

        ### checks if funciton selected all titles ###
        $sql = "SELECT COUNT(title) FROM `Articles` ";
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);

        Assert::count($result->fetch_array()[0], $titles);
        $conn->close();
    }
    public function testGetArticleById()
    {
    }
}

(new ArticleClassesTest())->run();
