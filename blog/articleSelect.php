<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('../temp');

############### main php import ###############

include("../src/articleClasses.php");

$Articles = new Articles();


$params = [
    'title' => $Articles->getTitleArray()
];


// kresli na výstup
$latte->render('../templates/articleSelect.latte', $params);
