<?php
class ArticleSearch
{
    public $counter = 0;
    public $articlesPerPage = 5;
    public $pagesPerList = 5;

    public $foundResults = false;

    public function getArticleList($page, $orderBy, $search)
    {
        ######## build SQL ########
        $sql = "SELECT * FROM `Articles`" . " WHERE title LIKE '%" . $search . "%' OR content LIKE '%" . $search . "%'" . " ORDER BY " . $orderBy;
        ######## SQL connect ########
        include "../config/mysql.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $i = 0;
        ######## pages config ########
        $firstPage = $this->articlesPerPage * ($page - 1);
        $lastPage = $firstPage + $this->articlesPerPage;


        ######## get array of article details info ########
        while ($row = $result->fetch_assoc()) {
            if ($i >= $firstPage && $i < $lastPage) {
                $lists[$i] = [$row['title'], $row['datePublic'], $row['destination'], $row['idArticles'], $row['author']];
                $this->foundResults = true;
            }
            $i++;
            $this->counter = $i;
        }
        if (!isset($lists)) {
            $lists = [[null, null, null, null]];
        }

        return $lists;
    }
    public function filterInput()
    {
        $orderByInput = "datePublic DESC";
        if (isset($_GET['orderBy'])) {
            $orderByInput = $_GET["orderBy"];
            return $orderByInput;
        } else {
            return $orderByInput;
        }
    }
    ############ remembers search input ############
    public function searchInput()
    {
        $searchInput = "";
        if (isset($_GET['searchInput'])) {
            $searchInput = $_GET["searchInput"];
            return $searchInput;
        } else {
            return $searchInput;
        }
    }
    public function getPages()
    {
        ### get $_GET variables ###
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['searchInput'])) {
            $searchInput = $_GET['searchInput'];
        }
        if (isset($_GET['orderBy'])) {
            $orderBy = $_GET['orderBy'];
        }

        ### variable setting ###
        $resultCount = $this->counter;
        $pageCount = ceil($resultCount / $this->articlesPerPage);
        $firstPage = $page - 2;
        $lastPage = $pageCount;

        if ($firstPage < 1) {
            $firstPage = 1;
        }

        if ($lastPage - $this->pagesPerList < $firstPage) {
            $firstPage = $lastPage - $this->pagesPerList;
        }
        for ($i = $firstPage; $i <= $firstPage + $this->pagesPerList; $i++) {
            if ($i <= $pageCount) {
                if ($i > 0) {
                    $url = $_SERVER['PHP_SELF'] . "?" . "page=" . $i;

                    if (isset($_GET['searchInput'])) {
                        $url = $url . "&&searchInput=" . $_GET['searchInput'];
                    }
                    if (isset($_GET['orderBy'])) {
                        $url = $url . "&&orderBy=" . $_GET['orderBy'];
                    }

                    $pages[$i] = [$i, $url];
                }
            }
        }
        if (!isset($pages)) {
            $pages = [[null, null]];
        }
        return $pages;
    }
}
