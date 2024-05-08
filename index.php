<?php
############### autoload ###############
require_once "vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

$Auth = new Auth;

### redirect if 
if (isset($_GET['searchInput'])) {
    header("location: blog/articleSearch?searchInput");
}
$authDetail = $Auth->getAuthDetail();

$params = [
    'authStatus' => $authDetail[0],
    'username' => $authDetail[1]
];
$latte->render('templates/homePage.latte', $params);
