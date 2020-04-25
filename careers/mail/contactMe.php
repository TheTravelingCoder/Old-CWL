<?php

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* If you installed PHPMailer without Composer do this instead: */

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';


/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


/* Open the try/catch block. */
try {
   /* Set the mail sender. */
   $mail->setFrom('chinookw@webserver3.pebblehost.com', 'Careers');

   /* Add a recipient. */
   $mail->addAddress('richards.kevin93@gmail.com', 'Kevin');

   /* Set the subject. */
   $mail->Subject = "New Job Applicant";

   /* Set the mail message body. */
   $mail->isHTML(TRUE);
   $mail->Body = "<html>
                  <body>
                  <table>
                  <tr>
                  <th>Name: </th>
                  <th>E-mail: </th>
                  <th>Phone Number: </th>
                  <th>Message: </th>
                  </tr>
                  <tr>
                  <td>$name</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$message</td>
                  </tr>
                  </table>
                  <p>Please do not reply to this message</p>
                  </body>
                  </html>";

   /* Add attachment to email */
   if (isset($_FILES['resume']) &&
    $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['resume']['tmp_name'],
                         $_FILES['resume']['name']);
                        }

   /* Finally send the mail. */
   $mail->send();

   echo 'Your E-mail has been sent successfully';
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}
