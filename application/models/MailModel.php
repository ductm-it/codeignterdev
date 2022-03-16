<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
            
        }
    }

    public function send_email_download($emailAddress, $file){

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

        // $data['user_id'] = $user_id;

        // Email body content
        $mailContent = $this->load->view('mailer_view' , $file, TRUE);
        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        //     <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            
        }
    }
 
}