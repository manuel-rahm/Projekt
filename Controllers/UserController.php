<?php

namespace JvJ\Controllers;

include('Controllers/DBController.php');
include('Models/User.php');

/**
 * Class that controls functions for users / usermanagement
 */

class UserController
{
    /**
     * Adds a user to the database
     * 
     * @param \JvJ\Models\User $user User object to insert into the database
     * 
     * @return void
     */
    public function addUser($user)
    {
    }
    /**
     * Returns an array with all users from the database
     * 
     * @return array<\JvJ\Models\User> Array containing all users from the database
     */
    public function getUsers()
    {
    }
    /**
     * Returns an array with all information from one user from the database
     * 
     * @return array<\JvJ\Models\User> Array containing one user from the database
     */
    public function getUser($username)
    {
    }
    /**
     * Get the role of the user that is logging in
     * @param string $username Username of the user
     */
    public static function getRole($username)
    {
    }
    /**
     * Updates a user in the database
     * 
     * @param \JvJ\Models\User $user User object with updated information
     * 
     * @return void
     */
    public function updateUser($user)
    {
    }
    /**
     * Deletes a user from the database
     * 
     * @param string $username Username of the user to delete
     * 
     * @return bool Returns true if the query was successfully run
     */
    public function deleteUser($username)
    {
    }
    /**
     * Resets the password of a user to a fixed value for initial login
     * @param string $username Username of the user to reset the password for
     * @param string $randomPassword A random password created that is sent to the user for login
     */
    public static function resetPassword($username, $randomPassword)
    {
    }
    /**
     * Generates a random, temporary password
     * @param int $chars the amount of characters the password should contain
     */
    public static function pwgenerate($chars)
    {
    }
    /**
     * Updates the password from the logged in user
     * @param string $username Username of the user logged in
     * @param string $password The new password of the user
     */
    public function updatePassword($username, $password)
    {
    }
}
