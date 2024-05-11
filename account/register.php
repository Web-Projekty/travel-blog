<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');
$Auth = new Auth;

$register['status'] = false;
$register['msg'] = null;

if (!empty($_POST['password']) && !empty($_POST['Cpassword']) && !empty($_POST['name']) && !empty($_POST['email'])) {
    $register = $Auth->register($_POST['password'], $_POST['Cpassword'], $_POST['name'], $_POST['email']);
}
$params = ['register' => $register];
$latte->render("../templates/register.latte", $params);
