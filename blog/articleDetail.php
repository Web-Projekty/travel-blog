<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('../temp');

$Auth = new Auth;
$File = new File;
$Database = new Database;

########### redirect to selection if form not filled ###########
if (!isset($_GET['articleId']) || $_GET['articleId'] == null) {
    header("location: articleSearch.php");
} else {

    $Articles = new Articles();

    $articleId = $_GET['articleId'];

    $article = $Articles->getArticleById($articleId);

    $background = $File->getFilesByPrefix("../src/images/dest/", $article['destinationId'], "jpg");
}

$authDetail = $Auth->getAuthDetail();

if ($article['succesfull']) {
    $params = [
        'title' => $article['title'],
        'content' => $article['content'],
        'img' => $article['img'],
        'author' => $article['author'],
        'destination' => $article['destination'],
        'backgrounds' => $background,
        'date' => $article['date'],
        'authStatus' => $authDetail[0],
        'username' => $authDetail[1]
    ];

    $latte->render('../templates/articleDetail.latte', $params);
} else {
    echo $article['errorMsg'];
    echo "<script>
    setTimeout(function() {
        window.location.href = 'articleSearch.php';
    }, 2000);
</script>";
}
