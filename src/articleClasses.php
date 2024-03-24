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
        $sql = "SELECT idArticles, title FROM Articles";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $title[$i] = [$row['idArticles'], $row['title']];
                $i++;
            }
            return $title;
            $conn->close();
        }
    }
    function getArticleById($articleId)
    {
        include("../config/mysql.php");

        ############### sql connection ###############
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

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
    function countRows($database)
    {
        ### set sql for specific database ###
        switch ($database) {
            case 1:
                $sql = "SELECT COUNT(title) FROM `Articles`";
                break;
            case 2:
                $sql = "SELECT COUNT(title) FROM `Destinations`";
                break;
            case 3:
                $sql = "SELECT COUNT(title) FROM `Users`";
                break;
            default:
                return "This table doesnt exist";
        }

        ### db stuff ###
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);
        return $result->fetch_array()[0];
    }
    ### fetches the last id used ###
    function getLastId($database)
    {
        ### chooses the right db and connects to mysql ###
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        switch ($database) {
            case 1:
                "SELECT * FROM `Articles` ORDER BY `Articles`.`idArticles` DESC";
                break;
            case 2:
                "SELECT * FROM `Destinations` ORDER BY `Articles`.`idArticles` DESC";
                break;
            case 3:
                $sql = "SELECT * FROM `Users` ORDER BY `Articles`.`idArticles` DESC";
                break;
            default:
                return "This table doesnt exist";
        }

        ### executes sql query ###
        $sql = "SELECT * FROM `Articles` ORDER BY `Articles`.`idArticles` DESC";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_array()[0];
    }
    ### get all ids from (any - will come back to this later) database ###
    function getIdArray()
    {
        ############### connect to sql ###############
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT idArticles FROM Articles";

        $result = $conn->query($sql);

        ### adds values to array $ids
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $ids[$i] = $row['idArticles'];
                $i++;
            }
            return $ids;
            $conn->close();
        }
    }
}
