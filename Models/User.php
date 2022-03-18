<?php

namespace JvJ\Models;

/**
 * Class for users, used to temporarily save the attributes of a user. Interacts with the corresponding controller
 * @param string $username the username of the user
 * @param string $password the password of the user
 * @param string $mail the mail of the user
 * @param string $role the role of the user
 */

class User
{
    private $username;
    private $password;
    private $mail;
    private $role;

    function __construct($username, $password, $mail, $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->role = $role;
    }

    /**
     * Get the username
     * 
     * @return string The username of the user
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the username
     * 
     * @param string $username Username of the user
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set the mail of the user
     * 
     * @param string $mail Mail address of the user
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get the mail of the user
     * 
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the password hash of the user
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the password of the user
     * 
     * @param string $password Clear-text password for the user
     * 
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, null);
    }

    /**
     * Get the role of the user
     * 
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the role of the user
     * 
     * @param string $role Role of the user
     * 
     * @return void
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}
