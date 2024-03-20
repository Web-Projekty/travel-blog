<?php

require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

include("../config/mysql.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$articleId = $_GET['articleId'];
$sql = "SELECT * FROM Articles WHERE idArticles = $articleId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $title = $row['Title'];
        $content = $row['Content'];
    }
}
$content = explode("|",$content);
$conn->close();

$params = ['title' => $title,'content'=>$content];

$latte->render('../templates/articleDetail.latte', $params);
