<?php

if(isset($_POST["reset-request-submit"]))
{
	$selector = $_POST["email"];
	$token = random_bytes(32);

	$url = "localhost/harborlights/create-new-password.php?selector=" .$selector . "&validator=" .  bin2hex($token);

	$expires = date("U") + 5000000000;

	require 'dbh.inc.php';

	$userEmail = $_POST["email"];

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
			echo "There was an error !";
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);

	}

	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{ 
			echo "There was an error !";
	}
	else
	{
		$hashedToken = password_hash($token, PASSWORD_DEFAULT); 
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken , $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	$to = $userEmail;
	$subject = '';

	$message = '<p>We received a password reset request. Click on the link below</p>';
	$message .= '<p>Password Reset Link:  </br>'; 
	$message .= '<a href="' .$url . '">' . $url . '</a></p>';

	$headers = "From: Harborlights <dharminlad1199@gmail.com>\r\n";
	$headers .= "Reply-To: dharminlad1199@gmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";


	// Load Composer's autoloader
	require '../phpmailer/PHPMailerAutoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'dharminlad1199@gmail.com';                     // SMTP username
	    $mail->Password   = 'Dh@rminlad110399';                               // SMTP password
	    $mail->SMTPSecure = TLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('dharminlad1199@gmail.com', 'DharminLad.tech');
	    $mail->addAddress($userEmail);     // Add a recipient
	    
	    $mail->addReplyTo('dharminlad1199@gmail.com');
	    

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Reset your Password';
	    $mail->Body    = $message;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}




	//mail($to, $subject, $message, $headers);

	header("Location: ../reset-password.php?reset=success");
}
else
{
	header("Location: ../index.php");
}