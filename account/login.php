<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');

$Auth = new Auth;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $login = $Auth->login($_POST['username'], $_POST['password']);
}
$params = ['login' => $login];
$latte->render("../templates/login.latte", $params);
