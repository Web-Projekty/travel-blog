<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

include "../src/listClasses.php";
$latte->setTempDirectory('../temp');

$Lists = new ArticleList();
$searchInput = "";
if (isset($_GET["searchInput"])) {
    $searchInput = $_GET["searchInput"];
}
$orderBy = "";
if (isset($_GET["orderBy"])) {
    $orderBy = $_GET["orderBy"];
}
if (isset($_GET['sql']) && isset($_GET['page'])) {
    $lists = $Lists->getArticleList($_GET['sql'], $_GET['page']);
} else {
    echo "no sql";
    $lists = [[null, null, null]];
}

$params = [
    'lists' => $lists
];

$latte->render('../templates/articleList.latte', $params);
