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
			echo "Jūsu ziņojums tika veiksmīgi nosūtīts!";
		}else{
			echo "Jūsu ziņojumu nevarēja nosūtīt.";
		}
		
		//Closing smtp connection
		$mail->smtpClose();
		}
?>

<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Re-<span>Books</span></h3>

        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Blog</a>
            ·
            <a href="#">Pricing</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Re-Books © 2022</p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

    <div class="footer-right">

        <p>Sazinies ar mums</p>

        <form method="POST">

            <input type="text" name="email" placeholder="E-pasts" required>
            <textarea name="message" placeholder="Ziņojums" required></textarea>
            <button>Sūtīt</button>

        </form>

    </div>

</footer>