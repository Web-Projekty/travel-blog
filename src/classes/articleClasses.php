<?php

class Articles
{
    private $Database;
    public function __construct()
    {
        $this->Database = new Database;
    }
    ############### returns array of all article titles ###############
    function getTitleArray()
    {
        $sql = "SELECT idArticles, title FROM Articles";
        $result = $this->Database->query($sql);

        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $titles[$i] = [$row['idArticles'], $row['title']];
                $i++;
            }
            return $titles;
        }
    }
    ### returns article for the provided article id ###
    function getArticleById($articleId)
    {
        $sql = "SELECT * FROM Articles INNER JOIN Users ON Users.idUsers = Articles.author INNER JOIN Destinations ON Destinations.idDestination = Articles.destination WHERE idArticles = $articleId";

        $result = $this->Database->query($sql);

        ############### sql data extraction ###############
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $article['title'] = $row['title'];
                $article['content'] = $row['content'];
                $article['img'] = $row['profileImg'];
                $article['author'] = $row['user'];
                $article['destination'] = $row['name'];
                $article['destinationId'] = $row['idDestination'];
                $article['date'] = $row['datePublic'];
            }
            $article['succesfull'] = true;
        }
        ############### setting error code
        else {
            $article['succesfull'] = false;
            $article['errorMsg'] = "Database request failed.";
        }


        return $article;
    }
    
}
