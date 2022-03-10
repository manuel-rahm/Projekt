<?php

namespace JvJ\Controllers;

/**
 * Class that controls mail operation for resetting the password
 */

class MailController
{
    /**
     * Sends an e-mail containing the temporary password
     * @param string $username Username of the user
     * @param string $usermail Mail the of user to send the mail to
     * @param string $randomPassword The random and temporary password
     */
    public static function sendMail($username, $usermail, $randomPassword)
    {
    }
}
