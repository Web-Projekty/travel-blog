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




######## article list data processing ########
$lists = $ArticleSearch->getArticleList($page, $orderBy, $searchInput);

$pages = $ArticleSearch->getPages();

$params = [
    'lists' => $lists,
    'searchInput' => $searchInput,
    'orderBy' => $orderBy,
    'pages' => $pages,
    'foundResults' => $ArticleSearch->foundResults
];

$latte->render('../templates/articleSearch.latte', $params);
