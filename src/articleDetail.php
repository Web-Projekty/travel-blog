<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

include("../config/mysql.php");

########### redirect to selection if form not filled ###########
if (!isset($_GET['articleId']) || $_GET['articleId'] == null) {
    header("location: articleSelect.php");
}

############### sql connection ###############
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$articleId = $_GET['articleId'];
$sql = "SELECT * FROM Articles WHERE idArticles = $articleId";

$result = $conn->query($sql);

############### sql data extraction ###############
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $content = $row['content'];
        $img = $row['profileImg'];
        $author = $row['author'];
        $destination = $row['destination'];
        $date = $row['datePublic'];
    }

    ########### foreign key get data ###########
    # for destination
    $sql = "SELECT name FROM Destinations WHERE idDestination = $destination";
    $result = $conn->query($sql);
    $destination = $result->fetch_row()[0];
    # for user
    $sql = "SELECT user FROM Users WHERE idUsers = $author";
    $result = $conn->query($sql);
    $user = $result->fetch_row()[0];
    $succesfull = true;
} else {
    $succesfull = false;
    $errorMsg = "Database request failed.";
}

$conn->close();
if ($succesfull) {
    $params = [
        'title' => $title,
        'content' => $content,
        'img' => $img,
        'author' => $user,
        'destination' => $destination,
        'date' => $date
    ];

    $latte->render('../templates/articleDetail.latte', $params);
} else {
    echo $errorMsg;
}
