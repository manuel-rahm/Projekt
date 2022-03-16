<?php

namespace JvJ\Controllers;

include('Controllers/UserController.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailconfig.php';
require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';

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
    public static function sendResetPasswordMail($username, $usermail, $randomPassword)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = MAILHOST;                               //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = MAILUSER;                               //SMTP username
            $mail->Password   = MAILPW;                                 //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(MAILUSER);
            $mail->addAddress($usermail);                               //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = 'JvJ - Password Reset';
            $mail->Body    = 'Hi ' . $username . '<br><br>Your temporary password is "' . $randomPassword . '".<br>Please change your password after initial login with the "Change Password" function.<br>
            <br>This mail was sent automatically, therefore do not respond to this mail.';

            if ($mail->send()) {
                echo '<script>alert("A mail with a temporary password has been sent, please check your junk e-Mail too. It can take several minutes until the mail is visible in your mailbox.")</script>';
            }
        } catch (Exception $e) {
        }
    }
}
