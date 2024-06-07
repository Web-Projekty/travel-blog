<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');

$Auth = new Auth;

if (!$Auth->getAuthDetail()[0]) {
    include "../src/error/404.html";
    die();
}

$params = [
    'authStatus' => $Auth->getAuthDetail()[0],
    'userName' => $Auth->getAuthDetail()[1],
    'email' => $Auth->getAuthDetail()[2]
];
$latte->render("../templates/dashboard.latte", $params);
