<?php
session_start();
require_once('phpmailer/class.phpmailer.php');

/*
if(isset($_SESSION['isMailSent'])) {
	die;
} 
*/

function send_mail( $to, $is_a_winner = false )
{	
	/*
	$prizes = array(
	
	
		"500_gift" => "Free gift card worth $500",
		"100_gift" => "Free gift card worth $100",
		"50_gift" => "Free gift card worth $50",
		"25_gift" => "Free gift card worth $25",
		
	);*/

	$mail             = new PHPMailer();
	$mail->IsSMTP(); 
	$mail->SMTPDebug  = 2;                     
	$mail->SMTPAuth   = true;                  
	
	/*$mail->Host       = "mail.dnsweepstakes.com"; 
	$mail->Username   = "noreply@dnsweepstakes.com"; 
	$mail->Password   = "mail!@#$";*/
	
	$mail->Host       = "smtp.sendgrid.net"; 
	$mail->Username   = "fastrack23"; 
	$mail->Password   = "gbdsss2000";
	
	//$mail->SetFrom('noreply@gmail.com', 'Test Mail');
	
	if($is_a_winner) 
	{	
		$mail->Subject    = "This mail is for testing purpose";
	}
	else
	{
		$mail->Subject    = "This mail is for testing purpose";
	}
	
	
	//$mail->MsgHTML("Test");
	
	$html = "";
	if($is_a_winner)
	{
		$html = "Win";
		//$html = str_replace("__prize__", $prizes[$prize], $html);
	}
	else
	{
		$html = "Lose";
	}
	
	$mail->MsgHTML($html);
	
	$mail->AddAddress($to, "Test User");

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	  die();
	} else {
	  echo "Message sent!";
	  $_SESSION['isMailSent'] = true;
	}
	
	
}

$mailreceipents = array(
   0=>"watermark0913@gmail.com",
   1=>"test1@mailimate.com",
   2=>"test12@mailimate.com",
   3=>"test123@mailimate.com",
   4=>"test1234@mailimate.com",
   5=>"test12345@mailimate.com",
   6=>"testuser@mailimate.com",
   7=>"testuser1@mailimate.com"
);

foreach($mailreceipents as $key=>$value){
  send_mail($value, "1"); 
}

