<?php
require_once "vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('/temp');

$params = [];
$latte->render('templates/homePage.latte', $params);
