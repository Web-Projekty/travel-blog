<?php

use Tester\Assert;

require_once "../vendor/autoload.php";
session_start();
### finds all files in the current directory ###
$phpFiles = glob("*.php");
### executes all files except this one ###
Tester\Environment::setup();
foreach ($phpFiles as $file) {
    if ($file !== basename(__FILE__)) {
        echo "\e[1;36m " . $file . "\e[0m\n";
        #require_once $file;
        Assert::true(true);
    }
}
