<?php
//ini_set("SMTP","ssl://smtp.gmail.com");
//ini_set("smtp_port","465");
$sessdir = 'session_dir';
ini_set('session.save_path', $sessdir); 
session_start();
if(strpos($_SERVER['HTTP_REFERER'],'wemachine.in')!==false)
{
    
    $target_dir = "uploads/";
	$target_file = "";
	$ext=explode(".",$_FILES["qfile"]["name"]);
	$a=count($ext)-1;
	$b=$ext[$a];
	$target_file = $target_dir . date('Ymdhis').".".$b;
	if(move_uploaded_file($_FILES["qfile"]["tmp_name"], $target_file))
    {
        $path="http://wemachine.in/".$target_file; 		
    } else
    {
        $path="No File Attached";        
    }
	
	$messagebody = '<html><body>';
    	 
	$messagebody .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
	 
	$messagebody .= "<tr><th>Download File</th><td><a href='".$path."' target='_blank'>Click Here</a></td></tr>";
	$messagebody .= "<tr><th>Name</th><td>".$_POST['fname']."</td></tr>";
	$messagebody .= "<tr><th>Company Name</th><td>".$_POST['cname']."</td></tr>";
	$messagebody .= "<tr><th>E-Mail</th><td>".$_POST['email']."</td></tr>";
	$messagebody .= "<tr><th>Message</th><td>".$_POST['message']."</td></tr>";
	 
	$messagebody .= "<tr><td colspan='2' align='center' font='colr:#999999;'><I>WeMachine GET INSTANT QUOTE Enquiry Generate wemachine.in</I></td></tr>";
	 
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
	$mail->Subject = "WeMachine GET INSTANT QUOTE Enquiry";
	$mail->Body = $messagebody; //"<b>Name :-</b> ".$_POST['fname']."\r\n<br /> <b>Company Name :-</b> ".$_POST['cname']."\r\n<br /> <b>Email :-</b> ".$_POST['email']."\r\n<br /> <b>Message :-</b> ".$_POST['message']."\r\n<br /> <b>Download File :-<b> ".$path;
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
	header("Location:get-instant-quote.php");	
}
?>