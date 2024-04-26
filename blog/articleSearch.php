<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

include "../src/searchClasses.php";
$latte->setTempDirectory('../temp');

######## class declaration ########
$ArticleSearch = new ArticleSearch();

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$type = "title";
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}

$orderBy = $ArticleSearch->filterInput();

$searchInput = $ArticleSearch->searchInput();




######## article list data processing ########
$lists = $ArticleSearch->getArticleList($page, $type, $orderBy, $searchInput);

$pages = $ArticleSearch->getPages();

$params = [
    'lists' => $lists,
    'type' => $type,
    'searchInput' => $searchInput,
    'orderBy' => $orderBy,
    'pages' => $pages,
    'foundResults' => $ArticleSearch->foundResults
];

$latte->render('../templates/articleSearch.latte', $params);
