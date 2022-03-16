<?php
session_start();
$title = "Users - JvJ";

include('header.php');
include('Controllers/UserController.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['role'], $_POST['addUser'])) {
    $hashedPassword = password_hash(trim($_POST['password']), NULL);
    $user = new \JvJ\Models\User(trim(htmlspecialchars($_POST['username'])), $hashedPassword, trim($_POST['email']), $_POST['role']);
    (new \JvJ\Controllers\UserController())->addUser($user);
}

if (isset($_GET['deleteUser'])) {
    $userController = new \JvJ\Controllers\UserController();
    $userController->deleteUser(htmlspecialchars($_GET['deleteUser']));
}
?>
<h1 class="title">Add User</h1>
<div class="addUser">

    <table>
        <form method="POST">
            <tr>
                <td><label for="username">Username / First name*</label></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password*</label></td>
                <td><input type="password" name="password" minlength="6" required></td>
            </tr>
            <tr>
                <td><label for="email">E-Mail</label></td>
                <td><input type="email" name="email"></td>
            </tr>
    </table>
    <label class="labelRole" for="Role">Select role:</label>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="uploader">Uploader</option>
        <option value="user">User</option>
    </select>
    <input id="addUserButton" type="submit" name="addUser" value="Add User">
    </form>

</div>
<div class="users">
    <h1>Users</h1>
    <table>
        <tr>
            <th>Username / First name</th>
            <th>Password</th>
            <th>E-Mail</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        $userController = new \JvJ\Controllers\UserController();
        $users = $userController->getUsers();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user->getUsername() . "</td>";
            echo "<td>" . $user->getPassword() . "</td>";
            echo "<td>" . $user->getMail() . "</td>";
            echo "<td>" . $user->getRole() . "</td>";
            echo '<td><a class="aButton" href="edituser.php?updateUser=' . $user->getUsername() . '">Edit</a></td>';
            echo '<td><a class="aButton" href="usermanagement.php?deleteUser=' . $user->getUsername() . '">Delete</a></td>';
            echo "</tr>";
        }
        ?>
</div>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>