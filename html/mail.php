<?php
//error_reporting('E_ALL & ~E_NOTICE');
	//error_reporting('E_ALL & ~E_WARRING');
//ini_set("SMTP","ssl://smtp.gmail.com");
//ini_set("smtp_port","465");
$sessdir = 'session_dir';
ini_set('session.save_path', $sessdir); 
session_start();
if(strpos($_SERVER['HTTP_REFERER'],'wemachine.in')!==false)
{
	$messagebody = '<html><body>';	 
	$messagebody .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
	$messagebody .= "<tr><th>Name</th><td>".$_POST['fname']."</td></tr>";
	$messagebody .= "<tr><th>Company Name</th><td>".$_POST['cname']."</td></tr>";
	$messagebody .= "<tr><th>E-Mail</th><td>".$_POST['email']."</td></tr>";
	$messagebody .= "<tr><th>Message</th><td>".$_POST['message']."</td></tr>";	 
	$messagebody .= "<tr><td colspan='2' align='center' font='colr:#999999;'><I>WeMachine CONTACT US Enquiry wemachine.in</I></td></tr>";	 
	$messagebody .= "</table>";	 
	$messagebody .= "</body></html>";

	include("smtptester/class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
 
	$mail = new PHPMailer();
	 
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	
	$mail->Host = "mail5013.site4now.net";
	
	$mail->Username = "info@wemachine.in";
	$mail->Password = "info!234"; 
	 
	$mail->From = "info@wemachine.in";
	$mail->FromName = "info @ WeMachine";
	 
	$mail->AddAddress("neweraenggworks@gmail.com","NewEra Engg");
	//$mail->AddAddress("rajiv.codes@gmail.com","Rajiv");
	$mail->addBCC('rajiv.codes@gmail.com',"Rajiv");
	$mail->Subject = "WeMachine CONTACT US Enquiry";
	$mail->Body = $messagebody; //"Name :- ".$_POST['fname']."\r\n<br /> Company Name :- ".$_POST['cname']."\r\n<br /> Email :- ".$_POST['email']."\r\n<br /> Message :- ".$_POST['message'];
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$str1= "gmail.com";
	$str2=strtolower($_POST["uname"]);
	If(strstr($str2,$str1))
	{
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		if(!$mail->Send()) {
			$_SESSION['response']='0';
			//echo "Mailer Error: " . $mail->ErrorInfo;
			//echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
			//echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
		} 
		else {
			$_SESSION['response']='1';
			//echo "Message has been sent";			
		}
	}
	else{
		$mail->Port = 25;
		if(!$mail->Send()) {
			$_SESSION['response']='0';
			//echo "Mailer Error: " . $mail->ErrorInfo;
			//echo "<br><BR>* Please double check the user name and password to confirm that both of them are correct. <br>";			
		} 
		else {
			$_SESSION['response']='1';
			//echo "Message has been sent";			
		}
	}
	header("Location:contact.php");
}
?>