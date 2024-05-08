<?php
### finds all files in the current directory ###
$phpFiles = glob("*.php");
### executes all files except this one ###
foreach ($phpFiles as $file) {
    if ($file !== basename(__FILE__)) {
        echo $file . "\n";
        require_once $file;
    }
}
