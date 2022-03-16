<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tranminhduc1299@gmail.com';
        $mail->Password = 'tranminhduc1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->isHTML(true);

        return $mail;
    }
}