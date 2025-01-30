<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once '../../vendor/autoload.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$emailReceiver = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL); 
		if (!$emailReceiver) {
			echo "Invalid email address.";
			exit;
		}
		$subject = "New Form Submission";
		$body = "<h2>New Form Submission</h2>";

		$mail = new PHPMailer(true);
		
		try {
			
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'prasunlaptop@gmail.com'; 
			$mail->Password = 'keig eqkc bzwb emvw'; 
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;
			//$mail->setFrom('prasun800@gmail.com', 'Form Systemddddddddd');
			$mail->addAddress($emailReceiver);
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $body;
			
			if ($mail->send()) {
				echo "Form submitted successfully. Email sent!";
				} else {
				echo "Form submitted, but email not sent.";
			}
			} catch (Exception $e) {
			echo "Error sending email: {$mail->ErrorInfo}";
		}
	}
?>
