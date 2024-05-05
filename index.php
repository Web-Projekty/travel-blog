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

$params = [];
$latte->render('templates/homePage.latte', $params);
