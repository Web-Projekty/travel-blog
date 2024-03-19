<?php

require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

include("../config/mysql.php");



$latte->render('../templates/articleSelect.latte', $params);