<?php
require_once "../vendor/autoload.php";
class ArticleSearch
{

    public $articlesPerPage = 5;
    public $pagesPerList = 5;
    public $foundResults = false;

    private $Database;
    private $counter = 0;
    ### creates new Database object ###
    public function __construct()
    {
        $this->Database = new Database;
    }
    ### searches based on filter and returns all nessecary data in array ###
    public function getArticleList(int $page, string $type, string $orderBy, string $search)
    {
        ######## build SQL ########
        switch ($type) {
            case "title":
                $sql = "SELECT * FROM `Articles` INNER JOIN Users ON Users.idUsers = Articles.author INNER JOIN Destinations ON Destinations.idDestination = Articles.destination WHERE 'title' LIKE '%" . $search . "%' OR content LIKE '%" . $search . "%'" . " ORDER BY " . $orderBy;
                break;
            case "author":
                $sql = "SELECT * FROM `Articles` INNER JOIN Users ON Users.idUsers = Articles.author INNER JOIN Destinations ON Destinations.idDestination = Articles.destination WHERE Users.userName LIKE '%" . $search . "%'  OR user LIKE '%" . $search . "%' ORDER BY " . $orderBy;
                break;
            case "destination":
                $sql = "SELECT * FROM `Articles` INNER JOIN Users ON Users.idUsers = Articles.author INNER JOIN Destinations ON Destinations.idDestination = Articles.destination WHERE Destinations.name LIKE '%" . $search . "%' ORDER BY " . $orderBy;
                break;
        }
        $result = $this->Database->query($sql);
        $i = 0;
        ######## pages config ########
        $firstPage = $this->articlesPerPage * ($page - 1);
        $lastPage = $firstPage + $this->articlesPerPage;

        ######## get array of article details info ########
        while ($row = $result->fetch_assoc()) {
            if ($i >= $firstPage && $i < $lastPage) {
                ### setting variables ###
                $datePublic = "Zveřejněno: " . date_format(new DateTime($row['datePublic']), "j/m/y G:i");
                $destination = "Destinace: " . $row['name'];
                $author = "Autor: " . $row['user'];
                $img = $row['profileImg'];
                $lists[$i] = [$row['title'], $datePublic, $destination, $row['idArticles'], $author, $img];
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
    ############ remembers type input ############
    public function typeInput()
    {
        $typeInput = "title";
        if (isset($_GET['type'])) {
            $typeInput = $_GET["type"];
            return $typeInput;
        } else {
            return $typeInput;
        }
    }
    ############ remembers filter input ############
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
    ### gets completed array of clickable page links ###
    public function getPages()
    {
        ### get $_GET variables ###
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['type'])) {
            $typeInput = $_GET["type"];
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
