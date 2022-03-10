<?php

namespace JvJ\Controllers;

/**
 * Class that controls the login process.
 * 
 */

class LoginController
{
    /**
     * Connect to the database to check if the user / password combination is correct
     * 
     * @param string $username username of the user
     * @param string $password Clear-text password of the user
     * 
     * @return boolean Returns true if the login was successful
     */
    public static function checkLogin($username, $password)
    {
    }
    /**
     * Destroys the session to log the user out
     * 
     * @return void
     */
    public static function logout()
    {
        session_start();
        session_destroy();
        header('Location: login.php');
    }
}
