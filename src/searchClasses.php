<?php
class ArticleSearch
{
    public $counter;
    public $articlesPerPage = 5;
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
        $lists = [[null, null, null]];
        ######## get array of article details info ########
        while ($row = $result->fetch_assoc()) {
            if ($i >= $firstPage && $i < $lastPage) {
                $lists[$i] = [$row['title'], $row['datePublic'], $row['destination'], $row['idArticles']];
            }
            $i++;
            $this->counter = $i;
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
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        while($){

        }

        return $pages;
    }
}
