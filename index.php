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

$ids = $Database->getIdArray(2);

foreach ($ids as $id) {
    $destImgs[$id] = $File->getFilesByPrefix("src/images/dest/", $id, "jpg");
}
var_dump($destImgs);

$params = [
    'authStatus' => $authDetail[0],
    'username' => $authDetail[1],
    'destImgs' => $destImgs,
];
$latte->render('templates/homePage.latte', $params);
