<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
class MailModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->library('email','session');
    }

    public function send_email($emailAddress, $user_id){

        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        $mail->setFrom('tranminhduc1299@gmail.com', 'Codeigniter Training');
        // $mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress($emailAddress);

        // Email subject
        $mail->Subject = 'New Account - Verify';

        // Set email format to HTML
        $mail->isHTML(true);

        $data['user_id'] = $user_id;

        // Email body content
        $mailContent = $this->load->view('mailer_view' , $data, TRUE);
        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        //     <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            $mail->send();
        }
    }

    public function send_email_download($emailAddress){

        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        $mail->setFrom('tranminhduc1299@gmail.com', 'Codeigniter Training');
        // $mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress($emailAddress);

        // Email subject
        $mail->Subject = 'New Account - Verify';

        // Set email format to HTML
        $mail->isHTML(true);


        // Email body content
        $htmlContent = '<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Document</title>
			</head>
			<body>
			<section>
			<div>
			<div>
			</div>
			<div>
			<h1>
			Xin chào <br>';
            $htmlContent .= $emailAddress;
            $htmlContent .= '</span>
			</h1>
			<p>Đây là file bạn cần, nhấn vào nút bên dưới để tải file!</p>
            <img src="' . base_url('/images/mailread/' . $emailAddress) . '" style="display: none;">
			<div>
			<a target="_blank" href = "' . base_url('public/files/Report.pdf') . '" style="padding: 10px; backgound-color:blue;">Tải về</a>
				</div>
				<div>
					<p>Hoặc nhấn vào đường dẫn này: <a target="_blank" href="';
            $htmlContent .= base_url('file/Report.pdf');
            $htmlContent .= '">';
            $htmlContent .= base_url('file/Report.pdf');
            $htmlContent .= '</a> để xác nhận.</p>
				</div>
				</div>
			</div>
			</section>
			</body>
			</html>';
        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        //     <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $htmlContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            $mail->send();
        }
    }
 
}