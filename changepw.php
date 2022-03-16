<?php
session_start();
$title = "Change PW - JvJ";

include('header.php');
include('Controllers/UserController.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['changePW']) && $_POST['username'] == $_SESSION['username']) {
    if (isset($_POST['password'], $_POST['confirmPassword']) && $_POST['password'] == $_POST['confirmPassword']) {
        $hashedPassword = password_hash(trim(htmlspecialchars($_POST['password'])), NULL);
        $userController = new \JvJ\Controllers\UserController();
        if ($userController->updatePassword(trim(htmlspecialchars($_POST['username'])), trim(htmlspecialchars($hashedPassword)))) {
            echo '<script>alert("Password successfully changed!");</script>';
        } else {
            echo '<script>alert("Password was not changed!");</script>';
        }
    } elseif (isset($_POST['changePW']) && $_POST['password'] != $_POST['confirmPassword']) {
        echo '<script>alert("Passwords must match!");</script>';
    }
} elseif (isset($_POST['changePW']) && $_POST['username'] != $_SESSION['username']) {
    echo '<script>alert("Do not try anything funny!");</script>';
}
?>
<h1 class="title">Edit Password</h1>
<div class="addUser">

    <table>
        <form method="POST">
            <td><input type="text" name="username" hidden value="<?php echo $_SESSION['username'] ?>"></td>
            <tr>
                <td><label for="password">New Password</label></td>
                <td><input type="password" name="password" minlength="6" required autofocus></td>
            </tr>
            <tr>
                <td><label for="password">Confirm Password</label></td>
                <td><input type="password" name="confirmPassword" minlength="6" required autofocus></td>
            </tr>
    </table>
    <input id="changePWButton" type="submit" name="changePW" value="Change Password">
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>