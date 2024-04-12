<?php
class ArticleList
{
    function getArticleList($sql, $page)
    {
        ######## SQL connect ########
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $i = 0;
        ######## get needed info ########
        $articlesPerPage = 5;
        $firstPage = $articlesPerPage * ($page - 1);
        $lastPage = $firstPage + $articlesPerPage;
        $lists = [[null, null, null]];
        while ($row = $result->fetch_assoc()) {
            if ($i >= $firstPage && $i < $lastPage) {
                $lists[$i] = [$row['title'], $row['datePublic'], $row['destination']];
            }

            $i++;
        }
        return $lists;
    }
}
