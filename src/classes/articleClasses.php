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
    ### returns count of rows in specified database ###
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
                return false;
        }

        $result = $this->Database->query($sql);

        return $result->fetch_array()[0];
    }
    ### fetches the last id used ###

    ### get all ids from any database ###
    function getIdArray($database)
    {
        switch ($database) {
            case 1:
                $sql = "SELECT idArticles FROM `Articles`";
                break;
            case 2:
                $sql = "SELECT idArticles FROM `Destinations`";
                break;
            case 3:
                $sql = "SELECT idArticles FROM `Users`";
                break;
            default:
                return false;
        }
        $sql = "SELECT idArticles FROM Articles";
        $result = $this->Database->query($sql);

        ### adds values to array $ids
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $ids[$i] = intval($row['idArticles']);
                $i++;
            }
            return $ids;
        }
    }
}
