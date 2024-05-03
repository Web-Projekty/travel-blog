<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form class="LForm" action="#" method="post">
        <label for="email">Email</label><br>
        <input type="text" name="username" placeholder="Enter your email" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Enter your password" required><br>
        <label for="password">Confirm password</label><br>
        <input type="password" name="Cpassword" placeholder="Confirm your password" required><br>
        <input type="submit" value="Sign up">
        <p>Already have an account? <a href="">Sign in</a></p>
    </form>
    <?php
    require_once "../../vendor/autoload.php";
    $Database = new Database;
    $Auth = new Auth;

    $Auth->register($_POST['username'], $_POST['password'], $_POST['Cpassword']);
    ?>
</body>

</html>