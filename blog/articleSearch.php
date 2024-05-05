<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('../temp');

$Auth = new Auth;

######## class declaration ########
$ArticleSearch = new ArticleSearch();

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$type = $ArticleSearch->typeInput();

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
