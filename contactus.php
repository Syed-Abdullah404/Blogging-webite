<?php 
include('./admin/db.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v7 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="contactfonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="contactcss/contactus.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="" method="POST">
					<h3>Contact Us</h3>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p> -->
					<label class="form-group">
						<input type="text" name="name" class="form-control"  required placeholder="Enter your name">
						
					</label>
					<label class="form-group">
						<input type="email" class="form-control" name="email" required placeholder="Enter your Email">

					</label>
					<label class="form-group" >
						<textarea name="message" id="" class="form-control" required placeholder="Enter your message"></textarea>
					
					</label>
					<button type="submit" name="send">Submit 
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


<?php
 error_reporting(0);
require 'PHPMailer/PHPMailerAutoload.php';
require 'credentials.php';


// use PHPMailer\PHPMailerAutoload;

if(isset($_POST['send'])){
    $to = $_POST['email'];
    $subject = $_POST['name'];
    $message = $_POST['message'];
	 


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAILID;                 // SMTP username
$mail->Password = PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom(EMAILID, 'Abdullah');
$mail->addAddress($to);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAILID, 'Abdullah');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;

$mail->Body = '<h3 style="font-size:0.9em;">Message<br/></h3> <h1>'.$message.'</h1>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo ' Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo '<script>alert("Your message has been sent successfully")</script>';

     $sql = "INSERT INTO `comments`(`name`, `email`, `comment`) VALUES ('$subject','$to','$message')";

     $que =  mysqli_query($con, $sql);
 if($sql){

	header("location:contactus.php");
}
}
 }
?>