<?php
class Articles
{
    public $title;
    ############### returns array of all article titles ###############
    function getTitleArray()
    {
        ############### connect to sql ###############
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT Title FROM Articles";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $title[$i] = $row['Title'];
                $i++;
            }
            return $title;
            $conn->close();
        }
    }
    function getArticleById()
    {
        include("../config/mysql.php");

        ############### sql connection ###############
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $articleId = $_GET['articleId'];
        $sql = "SELECT * FROM Articles WHERE idArticles = $articleId";

        $result = $conn->query($sql);

        ############### sql data extraction ###############
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $article['title'] = $row['title'];
                $article['content'] = $row['content'];
                $article['img'] = $row['profileImg'];
                $article['author'] = $row['author'];
                $article['destination'] = $row['destination'];
                $article['date'] = $row['datePublic'];
            }

            ########### foreign key get data ###########
            # for destination
            $sql = "SELECT name FROM Destinations WHERE idDestination = " . $article['destination'] . ";";
            $result = $conn->query($sql);
            $article['destination'] = $result->fetch_row()[0];
            # for user
            $sql = "SELECT user FROM Users WHERE idUsers = " . $article['author'];
            $result = $conn->query($sql);
            $article['author'] = $result->fetch_row()[0];
            $article['succesfull'] = true;
        }
        ############### setting error code
        else {
            $article['succesfull'] = false;
            $article['errorMsg'] = "Database request failed.";
        }

        $conn->close();
        return $article;
    }
}