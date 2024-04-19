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
$orderBy = $ArticleSearch->filterInput();

$searchInput = $ArticleSearch->searchInput();

$pages = $ArticleSearch->getPages();

######## article list data processing ########
$lists = $ArticleSearch->getArticleList($page, $orderBy, $searchInput);
$params = [
    'lists' => $lists,
    'searchInput' => $searchInput,
    'orderBy' => $orderBy,
    'pages' => $pages
];

$latte->render('../templates/articleSearch.latte', $params);
