<!DOCTYPE html>
<html>
<?php

use JvJ\Controllers\MailController;
use JvJ\Controllers\UserController;

require_once('Controllers/MailController.php');
require_once('Controllers/UserController.php');

if (isset($_POST['username'], $_POST['email'])) {
    $userController = new \JvJ\Controllers\UserController();
    $user = $userController->getUser(trim(htmlspecialchars($_POST['username'])));
    if ($user->getMail() == trim($_POST['email'])) {
        $randomPassword = UserController::pwgenerate(7);
        MailController::sendResetPasswordMail(trim(htmlspecialchars($_POST['username'])), trim(htmlspecialchars($_POST['email'])), $randomPassword);
        UserController::resetPassword(trim(htmlspecialchars($_POST['username'])), $randomPassword);
    } else {
        echo "<script>alert('Mail and/or user not found in the database or the provided mail does not belong to the entered user!')</script>";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/loginstyle.css" rel="stylesheet">
    <title>PW Reset - JvJ</title>
</head>

<body>
    <video src="assets/loginBackground.mp4" class="videoBackground" muted loop autoplay></video>
    <div class="login">
        <form method="POST">
            <h1 class="loginTitle">PW Reset - JvJ</h1>
            <div class="loginBody">
                <label for="username">Username*:</label>
                <input class="inputLogin" type="username" name="username" autofocus required>
                <label for="email">E-Mail*:</label>
                <input class="inputLogin" type="email" name="email" required>
                <button class="loginButton" type="submit" value="login">Reset PW</button>
                <a class="getBackLink" href="login.php">Go back to login</a>
            </div>
    </div>
    </form>

</body>

</html>