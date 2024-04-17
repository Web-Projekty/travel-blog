<?php
class ArticleSearch
{
    function getArticleList($page, $orderBy, $search)
    {
        ######## build SQL ########
        $sql = "SELECT * FROM `Articles`"  . " WHERE title LIKE '%" . $search . "%' OR content LIKE '%" . $search . "%'" . " ORDER BY " . $orderBy;
        ######## SQL connect ########
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $i = 0;
        ######## pages config ########
        $articlesPerPage = 5;
        $firstPage = $articlesPerPage * ($page - 1);
        $lastPage = $firstPage + $articlesPerPage;
        $lists = [[null, null, null]];
        ######## get array of article details info ########
        while ($row = $result->fetch_assoc()) {
            if ($i >= $firstPage && $i < $lastPage) {
                $lists[$i] = [$row['title'], $row['datePublic'], $row['destination']];
            }
            $i++;
        }
        return $lists;
    }
    function filterInput()
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
    function searchInput()
    {
        $searchInput = "";
        if (isset($_GET['searchInput'])) {
            $searchInput = $_GET["searchInput"];
            return $searchInput;
        } else {
            return $searchInput;
        }
    }
}
