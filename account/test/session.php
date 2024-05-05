<?php
require_once "../../vendor/autoload.php";
$Auth = new Auth;
echo "<br>";
switch (session_status()) {
    case PHP_SESSION_NONE: {
            echo "session neexistuje";
        }
    case PHP_SESSION_DISABLED: {
            echo "session je vyplá";
        }
    case PHP_SESSION_ACTIVE: {
            echo "session je aktivní";
            echo "<br>auth: ";
            echo var_dump($_SESSION['auth']);
            echo "<br>uid: " . $_SESSION['uid'];
            echo "<br>timeout: " . (time() - $_SESSION['timeout']);
        }
}
