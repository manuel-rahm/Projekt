<?php
session_start();
$title = "Edit User - JvJ";

include('header.php');
include('Controllers/UserController.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['updateUser'])) {
    $userController = new \JvJ\Controllers\UserController();
    $user = $userController->getUser(htmlspecialchars($_GET['updateUser']));
}

if (isset($_POST['password'], $_POST['editUser'])) {
    $hashedPassword = password_hash(trim($_POST['password']), NULL);
    $userController = new \JvJ\Controllers\UserController();
    $user = new \JvJ\Models\User($_POST['username'], $hashedPassword, trim($_POST['email']), $_POST['role']);
    $userController->updateUser($user);
} elseif (!isset($_POST['password']) and isset($_POST['editUser'])) {
    $userController = new \JvJ\Controllers\UserController();
    $user = new \JvJ\Models\User($_POST['username'], "", trim($_POST['email']), $_POST['role']);
    $userController->updateUserWoPassword($user);
}
?>
<h1 class="title">Edit User</h1>
<div class="addUser">

    <table>
        <form method="POST">
            <tr>
                <td><label for="username">Username / First name</label></td>
                <td><input type="text" name="username" value="<?php echo $user->getUsername(); ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="password">Password <br>(leave empty if not required)</label></td>
                <td><input type="password" name="password" minlength="6"></td>
            </tr>
            <tr>
                <td><label for="email">E-Mail</label></td>
                <td><input type="text" name="email" value="<?php echo $user->getMail(); ?>"></td>
            </tr>
    </table>
    <label class="labelRole" for="Role">Select role:</label>
    <select name="role">

        <option value="admin" <?php if ($user->getRole() == "admin") {
                                    echo "selected";
                                } ?>>Admin</option>
        <option value="uploader" <?php if ($user->getRole() == "uploader") {
                                        echo "selected";
                                    } ?>>Uploader</option>
        <option value="user" <?php if ($user->getRole() == "user") {
                                    echo "selected";
                                } ?>>User</option>

    </select>
    <input id="editUserButton" type="submit" name="editUser" value="Edit User">
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>