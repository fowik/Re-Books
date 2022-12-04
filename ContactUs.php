<?php

//Include required PHPMailer files
	require 'back-end/PHPMailer.php';
	require 'back-end/SMTP.php';
	require 'back-end/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if($_POST) {

		$email = "";
		$message = "";
		$my_email = "emilsstrelis360@gmail.com";
		
		//Create instance of PHPMailer
		$mail = new PHPMailer();
		
		//Set mailer to use smtp
		$mail->isSMTP();
		
		//Define smtp host
		$mail->Host = "smtp.gmail.com";
		
		//Enable smtp authentication
		$mail->SMTPAuth = true;
		
		//Set smtp encryption type (ssl/tls)
		$mail->SMTPSecure = "tls";
		
		//Port to connect smtp
		$mail->Port = "587";
		
		//Set gmail username
		$mail->Username = "emilsstrelis360@gmail.com";
		
		//Set gmail password
		$mail->Password = "cofxornytlvsojmk";
		
		//Email message
		if(isset($_POST['message'])) {
			$message = htmlspecialchars($_POST['message']);
		}
		
		//Email subject
		$mail->Subject = "New message from Re-Books";
		
		//Visitor email
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		
		//Set sender email
		$mail->setFrom($email);
		
		//Enable HTML
		$mail->isHTML(true);
		
		//Email body
		$mail->Body = 
		"
		<div>
			<label><b>E-mail:</b></label>&nbsp;<span>".$email."</span>
		</div>
		<div>
			<label><b>Message:</b></label>
				<div>".$message."</div>
		</div>
		";
		
		//Add recipient
		$mail->addAddress('emilsstrelis360@gmail.com');
		
		//Finally send email
		if ( $mail->send() ) {
			echo "Jūsu ziņojums tika veiksmīgi nosūtīts!";
		}else{
			echo "Jūsu ziņojumu nevarēja nosūtīt.";
		}
		
		//Closing smtp connection
		$mail->smtpClose();
		}
		?>