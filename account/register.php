<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');
$Auth = new Auth;

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['Cpassword']) && !empty($_POST['name']) && !empty($_POST['email'])) {
    $Auth->register($_POST['username'], $_POST['password'], $_POST['Cpassword'], $_POST['name'], $_POST['email']);
}
$latte->render("../templates/register.latte");
