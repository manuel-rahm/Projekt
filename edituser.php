<?php
session_start();
$title = "Edit User - JvJ";
include('header.php');
include('Controllers/UserController.php');
if ($_SESSION['role'] != 'Admin') {
    header('Location: login.php');
    exit;
}
?>
<h1 class="title">Edit User</h1>
<div class="addUser">

    <table>
        <form method="POST">
            <tr>
                <td><label for="username">Username / First name</label></td>
                <td><input type="text" name="username" value="" readonly></td>
            </tr>
            <tr>
                <td><label for="password">Password <br>(leave empty if not required)</label></td>
                <td><input type="password" name="password" minlength="6"></td>
            </tr>
            <tr>
                <td><label for="email">E-Mail</label></td>
                <td><input type="text" name="email" value=""></td>
            </tr>
    </table>
    <label class="labelRole" for="Role">Select role:</label>
    <select name="role">

        <option value="admin">Admin</option>
        <option value="user">User</option>

    </select>
    <input id="editUserButton" type="submit" name="editUser" value="Edit User">
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>