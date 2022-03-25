<?php

class Producer extends CI_Controller
{
    public function index()
    {
      $mailPayload = new stdClass();
      $mailPayload->Host = "smtp.gmail.com";      
      $mailPayload->SMTPAuth = true;      
      $mailPayload->Username = "tranminhduc1299@gmail.com";      
      $mailPayload->Password = "tranminhduc1234";      
      $mailPayload->SMTPSecure = "ssl";      
      $mailPayload->Port = 465;      
      $mailPayload->FromEmail = "tranminhduc1299@gmail.com";      
      $mailPayload->FromName = "Brian Tran";      
      $mailPayload->To = "duc.tran@southtelecom.vn";      
      $mailPayload->isHTML = true;      
      $mailPayload->Subject = "Test is Test Email Use Beanstalkd Queue";      
      $mailPayload->Body = "<b>This is a Test Email sent via Gmail SMTP Server Use Beanstalkd Queue.</b>";      
      $mailPayload->Callback = "UpdateSendStatus";
      
      $queue = new Pheanstalk\Pheanstalk('127.0.0.1');      
      $queue->useTube("smailer")->put(json_encode($mailPayload));
    }
}
?>
