<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');

$Auth = new Auth;

if ($Auth->getAuthDetail()[0]) {
    echo "good";
} else {
    echo "forbidden";
}
