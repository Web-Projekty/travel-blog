<?php
############### autoload ###############
require_once "../vendor/autoload.php";
$latte = new Latte\Engine;
$latte->setTempDirectory('../temp');

$Auth = new Auth;

if ($Auth->getAuthDetail()[0]) {
    $Auth->logout();
}
?>
<p>Byli jste úspěšně odhlášeni</p>
<script>
    setTimeout(function() {
        window.location.href = 'login.php';
    }, 2000);
</script>