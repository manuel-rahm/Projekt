<!DOCTYPE html>
<html>
<?php
session_start();

include('Controllers/LoginController.php');
include('Controllers/UserController.php');
require_once('Controllers/DBController.php');

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

if (isset($_POST['username'], $_POST['password'])) {
    if (JVJ\Controllers\LoginController::checkLogin(trim(htmlspecialchars($_POST['username'])), trim(htmlspecialchars($_POST['password'])))) {
        $_SESSION['animate'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = \JvJ\Controllers\UserController::getRole(trim(htmlspecialchars($_POST['username'])));
        header('Location: index.php');
    } else {
        echo '<script>alert("Username or password is incorrect!");</script>';
    }
} else {
    '<script>alert("Enter username and password!");</script>';
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/loginstyle.css" rel="stylesheet">
    <title>Login - JvJ</title>
</head>

<body>
    <video src="assets/loginBackground.mp4" class="videoBackground" muted loop autoplay></video>
    <div class="login">
        <h1 class="loginTitle">Login - JvJ</h1>
        <form method="POST">
            <div class="loginBody">
                <label for="username">Username*:</label>
                <input class="inputLogin" type="username" name="username" autofocus required>
                <label for="password">Password*:</label>
                <input class="inputLogin" type="password" name="password" minlength="6" required>
                <button class="loginButton" type="submit" value="Submit" name="submit">Log In</button>
                <a class="forgot" href="forgot.php">Forgot your password?</a>
            </div>
    </div>
    </form>
    </div>
</body>

</html>