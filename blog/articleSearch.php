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

$authDetail = $Auth->getAuthDetail();

$params = [
    'lists' => $lists,
    'type' => $type,
    'searchInput' => $searchInput,
    'orderBy' => $orderBy,
    'pages' => $pages,
    'foundResults' => $ArticleSearch->foundResults,
    'authStatus' => $authDetail[0],
    'username' => $authDetail[1]
];

$latte->render('../templates/articleSearch.latte', $params);
