<?php
require_once "vendor/autoload.php";
$latte = new Latte\Engine;

$params = [];
$latte->render('templates/homePage.latte', $params);
