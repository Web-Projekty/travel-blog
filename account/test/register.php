<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form class="LForm" action="#" method="post">
        <label for="email">jméno a příjmení</label><br>
        <input type="text" name="name" placeholder="méno a příjm" required><br>
        <label for="email">Username</label><br>
        <input type="text" name="username" placeholder="Enter your uname" required><br>
        <label for="email">e-mail</label><br>
        <input type="text" name="email" placeholder="Enter your email" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Enter your password" required><br>
        <label for="password">Confirm password</label><br>
        <input type="password" name="Cpassword" placeholder="Confirm your password" required><br>
        <input type="submit" value="Sign up">
        <p>Already have an account? <a href="">Sign in</a></p>
    </form>
    <?php
    require_once "../../vendor/autoload.php";
    $Auth = new Auth;

    $Auth->register($_POST['username'], $_POST['password'], $_POST['Cpassword'], $_POST['name'], $_POST['email']);
    ?>
</body>

</html>