<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit']) ){
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];

	require ('PHPMailer\PHPMailer.php');
    require ('PHPMailer\SMTP.php');
    require ('PHPMailer\Exception.php');

    
	$mail= new PHPMailer(true);
  try {
  $mail->SMTPDebug = 0; 
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->SMTPAuth =true;
	 $mail->Username="here type ur gmail";
	 $mail->Password='here type ur gmail passwrod'; 
	  $mail->Port=465;
	  $mail->SMTPSecure='ssl'; 
	
	  $mail->isHTML(true);
	  $mail->setFrom($email,'testing email');
	  $mail->addAddress('here type ur gmail', 'recivername'); 
      $mail->Subject = 'Here is the subject'.$name;
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>'.$email;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'.$subject;
	

		$mail->send();
    	//echo " email is send";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  } 
}
	

?> 
<!DOCTYPE html>
<html>
<body>

<h1>index page</h1>

<form id="myForm" method="post">
  <label for="fname">name:</label>
  <input id="name" type="text" id="name" name="name"><br><br> 
  <label id="" for="lname">email:</label>
  <input id="email"type="email"  name="email"><br><br>
   <label for="fname">passwrod</label>
  <input id="subject" type="text" name="subject"><br><br> 
  <input  onclick="sendemail()" type="submit" value="submit" name="submit">
</form>

 
</body>

</html>
