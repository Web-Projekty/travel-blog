<?php
############### autoload ###############
require_once "vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

$Auth = new Auth;
$File = new File;
$Database = new Database;

### redirect if
if (isset($_GET['searchInput'])) {
    header("location: blog/articleSearch?searchInput");
}

$authDetail = $Auth->getAuthDetail();

$sql = "SELECT * FROM Destinations";

$result = $Database->query($sql);

while ($row = $result->fetch_assoc()) {
    $destImgs[$row['idDestination']] = [$File->getFilesByPrefix("src/images/dest/", $row['idDestination'], "jpg")[0], $row['name']];
}

$params = [
    'authStatus' => $authDetail[0],
    'username' => $authDetail[1],
    'destImgs' => $destImgs,
];
$latte->render('templates/homePage.latte', $params);
