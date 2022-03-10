<?php
session_start();
$title = "Users - JvJ";
include('header.php');
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
                <td><input type="text" name="email"></td>
            </tr>
    </table>
    <label class="labelRole" for="Role">Select role:</label>
    <select name="role">
        <option value="admin">Admin</option>
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
</div>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>