<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');

$Auth = new Auth;
$login['status'] = false;
$login['msg'] = null;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $login = $Auth->login($_POST['username'], $_POST['password']);
}
$params = ['login' => $login];
$latte->render("../templates/login.latte", $params);
