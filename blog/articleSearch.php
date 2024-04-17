<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

include "../src/searchClasses.php";
$latte->setTempDirectory('../temp');

######## class declaration ########
$Lists = new ArticleSearch();

######## search data processing ########
$searchInput = null;
if (isset($_GET["searchInput"]) && !empty($_GET['searchInput'])) {
    $searchInput = $_GET["searchInput"];
}
$orderBy = "datePublic DESC";
if (isset($_GET["orderBy"])) {
    $orderBy = $_GET["orderBy"];
}
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

######## article list data processing ########
$lists = $Lists->getArticleList($page, $orderBy, $searchInput);
$params = [
    'lists' => $lists,
    'orderBy' => $orderBy,
    'searchInput' => $searchInput
];

$latte->render('../templates/articleSearch.latte', $params);
