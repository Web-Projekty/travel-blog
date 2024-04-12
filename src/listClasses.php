<?php
class ArticleList
{
    function getArticleList($sql)
    {
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $title[$i] = [$row['title'], $row['datePublic'], $row['destination']];
            $i++;
        }
        return $title;
    }
}
