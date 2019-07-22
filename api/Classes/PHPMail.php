<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\vendor\autoload.php';

class PHPMail{
    public function __construct()
    {
    }


    public function sending()
    {

    $mail = new PHPMailer(TRUE);


    // $mailer->Host = 'smtp.gmail.com';
    // $mailer->Port = 587; //can be 587
    // $mailer->SMTPAuth = TRUE;
    // $mailer->SMTPSecure = 'tls';
    try{

        $mail->setFrom('hackeziah0514@gmail.com','hackeziah');
        $mail->addAddress('lamadridkevin@gmail.com','kevin');
        $mail->Subject = 'ASPEN';
        $mail->Body = 'There is a great disturbance in the Force.';
        /* SMTP parameters. */
        /* Tells PHPMailer to use SMTP. */
        $mail->isSMTP();
        /* SMTP server address. */
        $mail->Host = 'smtp.gmail.com';
        /* Use SMTP authentication. */
        $mail->SMTPAuth = TRUE;
        /* Set the encryption system. */
        $mail->SMTPSecure = 'ssl';
        /* SMTP authentication username. */
        $mail->Username = "hackeziah0514@gmail.com";
        /* SMTP authentication password. */
        $mail->Password = "hackeziah0514passw0rd";
        /* Set the SMTP port. */
        $mail->Port = 465;
        /* Finally send the mail. */
        $mail->send();

    }catch (\Exception $e)
    {
        echo $e->getMessage();
    }

    }


}