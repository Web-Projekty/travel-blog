<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

include "../src/listClasses.php";
$latte->setTempDirectory('../temp');

$Lists = new ArticleList();
$lists = $Lists->getArticleList($_GET['sql']);

$searchInput = "";
if(isset($_GET["searchInput"])){
    $searchInput = $_GET["searchInput"];
}
$orderBy = "";
if(isset($_GET["orderBy"])){
    $orderBy = $_GET["orderBy"];
}

$params = [
    'lists' => $lists
];

$latte->render('../templates/articleList.latte', $params);
