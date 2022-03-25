<?php

 

/*

* Copyright © 2014 South Telecom

* Filename: <path_to_dir>/worker-email-smmailer.php

* HOWTO RUN:

* 1.Start: php <path_to_dir>/worker-email-smmailer.php

* 2.Stop: xóa file <path_to_dir>/worker-emmail-smailer.pid

 *   - Windows: Del /f "<path_to_dir>/worker-emmail-smailer.pid"

*   - Linux: rm -f "<path_to_dir>/worker-emmail-smailer.pid"

* 

 *

 */

require "vendor/autoload.php";
use Pheanstalk\Pheanstalk;
use PHPMailer\PHPMailer\PHPMailer;


 

function UpdateSendStatus($mailPayload) {

	echo $mailPayload->SendResult . PHP_EOL;

	if (!$mailPayload->SendResult) {

        echo $mailPayload->ErrorInfo . PHP_EOL;

	}

}

 

$WATCHTUBE = "smailer";

$queue = new Pheanstalk('127.0.0.1'); // OR IP Address of Server running beanstalkd



$PIDFILE = substr(__FILE__ ,0,-3) . 'pid'; 

//$PIDFILE = __DIR__ . "/worker-emmail-smailer.pid";

 

touch($PIDFILE);

 

echo "Worker " . __FILE__ . " have started. To exit, delete pid file  " .  $PIDFILE . PHP_EOL;

 

while (file_exists($PIDFILE)) {

     while ($job = $queue->watch($WATCHTUBE)->ignore('default')->reserve(15)) {

    	try {

        	$mailPayload = json_decode($job->getData(), false);

        	$mail = new PHPMailer();

        	$mail->isSMTP();

        	$mail->Host = $mailPayload->Host;  // Specify main and backup SMTP servers

        	$mail->SMTPAuth = $mailPayload->SMTPAuth; // Enable SMTP authentication

        	$mail->Username = $mailPayload->Username; // SMTP username

        	$mail->Password = $mailPayload->Password; // SMTP password

        	$mail->SMTPSecure = $mailPayload->SMTPSecure; // Enable TLS encryption, `ssl` also accepted

        	$mail->Port = $mailPayload->Port; // 587; // TCP port to connect to

 

        	$mail->SMTPOptions = array(

            	'ssl' => array(

                	'verify_peer' => false,

                	'verify_peer_name' => false,

                	'allow_self_signed' => true

            	)

        	);

 

        	$mail->setFrom($mailPayload->FromEmail, $mailPayload->FromName);

 

        	foreach (explode(',', $mailPayload->To) as $to) {

            	$mail->addAddress($to);

        	}

        	// Name is optional

        	$mail->isHTML($mailPayload->isHTML); // Set email format to HTML

        	$mail->Subject = $mailPayload->Subject;

        	$mail->Body = $mailPayload->Body;

        	$mailPayload->SendResult = $mail->send();

        	if (!$mailPayload->SendResult) {

            	$mailPayload->ErrorInfo = $mail->ErrorInfo;

        	}

 

        	$mailPayload->SendTimestamp = time();

        	$mail->smtpClose();

 

        	//Excute Callback function

    	        if (function_exists($mailPayload->Callback)) {

            	   call_user_func($mailPayload->Callback, $mailPayload);

        	}

        	//End Callback function 

                $queue->delete($job);

    	} catch (Exception $e) {

        	$jobData = $job->getData();

        	$queue->delete($job);

        	var_dump($e);

        	//If day job vao lai

        	$queue->useTube($WATCHTUBE)->put($jobData);

        	exit();

    	}

    	if(!file_exists($PIDFILE)){

        	exit();

    	}

    }

}