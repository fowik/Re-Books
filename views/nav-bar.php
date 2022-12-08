<nav class="nav-bar-wrapper">
    <div class="nav-bar">
        <ul>
            <h2 class="logo"><a href="index.php">Re-<span>Books</span></a></h2>
            <!-- <li class="log-reg-panel"><a href="#">Ienākt</a></li> -->
            <li class="log-reg-panel"><a href="LogInPage.php">Reģistrēties</a></li>
        </ul>
    </div>
</nav>
<?php
//Include required PHPMailer files
	require 'back-end/PHPMailer.php';
	require 'back-end/SMTP.php';
	require 'back-end/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if (array_key_exists('email', $_POST)) {
		
		$email = "";
		$message = "";
		$my_email = "emilsstrelis360@gmail.com";
		// $my_email = "ilarimsa937@gmail.com";
		
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
		// $mail->Username = "ilarimsa937@gmail.com";
		
		//Set gmail password
		$mail->Password = "cofxornytlvsojmk";
		// $mail->Password = "rxexlgukwdrzgmkt";
		
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
		// $mail->addAddress('ilarimsa937@gmail.com');
		
		//Finally send email
		if ( $mail->send() ) {
			echo "
			<style>
			.access-wrapper {
				position: sticky;
				z-index: 10;
				color: white;
				background-color: #04AA6D; 
				width: 100%; 
				height: 60px; 
				line-height: 60px;
			}
			
			.access-message {
				font-size: 20px;
				padding-top: auto;
				padding-bottom: auto;
				margin-left: 20px;
			}
			
			.close_button {
				font-size: 30px; 
				float: right;
				margin-right: 20px;
				background: none;
				border: none;
				color: white;
			}
			
			.close_button::selection {
				color: black;
			}

			</style>
			<div class ='access-wrapper' id='access-wrapper'>
				<div class='access-message'>
					Jūsu ziņojums tika veiksmīgi nosūtīts!
					<a class='close_button' onclick='hide()' id='close_button'>X</a>
				</div>
			</div>";
		}else{
			echo "
			<style>
			.access-wrapper {
				position: sticky;
				z-index: 10;
				color: white;
				background-color: #aa0404; 
				width: 100%; 
				height: 60px; 
				line-height: 60px;
			}
			
			.access-message {
				font-size: 20px;
				padding-top: auto;
				padding-bottom: auto;
				margin-left: 20px;
			}
			
			.close_button {
				font-size: 30px; 
				float: right;
				margin-right: 20px;
				background: none;
				border: none;
				color: white;
			}
			
			.close_button::selection {
				color: black;
			}

			</style>
			<div class ='access-wrapper' id='access-wrapper'>
				<div class='access-message'>
					Jūsu ziņojumu nevarēja nosūtīt.
					<a class='close_button' onclick='hide()' id='close_button'>X</a>
				</div>
			</div>";
		}
		
		//Closing smtp connection
		$mail->smtpClose();
		}
?>