<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test login</title>
</head>

<body>
    <form class="LForm" action="#" method="post">
        <label for="email">E-mail</label><br />
        <input type="text" name="username" placeholder="Enter your email" required /><br />
        <label for="password">Heslo</label><br />
        <input type="password" name="password" placeholder="Enter your password" required /><br />
        <input type="submit" value="Přihlásit se" />
        <p>Nemáte účet? <a href="">Registrovat se</a></p>
    </form>
    <?php
    ############### autoload ###############
    require_once "../../vendor/autoload.php";

    $Auth = new Auth;

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $Auth->login($_POST['username'], $_POST['password']);
    } ?>
</body>

</html>