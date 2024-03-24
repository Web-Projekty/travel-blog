<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('../temp');


########### redirect to selection if form not filled ###########
if (!isset($_GET['articleId']) || $_GET['articleId'] == null) {
    header("location: articleSelect.php");
} else {
    ############### main php import ###############

    include("../src/articleClasses.php");

    $Articles = new Articles();

    $articleId = $_GET['articleId'];

    $article = $Articles->getArticleById($articleId);
}


if ($article['succesfull']) {
    $params = [
        'title' => $article['title'],
        'content' => $article['content'],
        'img' => $article['img'],
        'author' => $article['author'],
        'destination' => $article['destination'],
        'date' => $article['date']
    ];

    $latte->render('../templates/articleDetail.latte', $params);
} else {
    echo $article['errorMsg'];
}
