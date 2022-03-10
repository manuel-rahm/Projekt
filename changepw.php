<?php
session_start();
$title = "Change PW - JvJ";
include('header.php');
?>
<h1 class="title">Edit Password</h1>
<div class="addUser">

    <table>
        <form method="POST">
            <td><input type="text" name="username" hidden value=""></td>
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