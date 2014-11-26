<?php
  //Set values for page
  $page_title = "Contact | Nicebox";

	include 'includes/header.php';
?>

<?php
$email = $_POST['email'];
$message = $_POST['message'];

if(isset($_POST['submit'])){
  if  ((empty($email)) || (empty($message))){ }
  else
  {
    require 'mailer/PHPMailerAutoload.php';   // require
    $mail = new PHPMailer;                    // new PHPMailer

    $mail->isSMTP();
    $mail -> Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'thomaskimura15@gmail.com';     // login email
    $mail->Password = 'publicbutter';                 // login password
    $mail->From = $email;                             // who the submission comes from
    $mail->FromName = 'Nicebox';                      // name that will appear in email
    $mail->addAddress('thomaskimura15@gmail.com');    // who to send this too
    $mail->addReplyTo($email);                        // who replies wil go to
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = 'Nicebox Concat Form';           // subject of email
    $mail->Body    = $message;                        // content of email
    $mail->AltBody = $message;

    if(!$mail->send()) {
       echo 'Message could not be sent.';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       exit;
    }
    $check = "sent";  // variable to check if sent
  }
}
else{ }
?>


	<div class="container padding-bottom-x3">
		<div class="centerColumn">
      <h1 class="centerText">Say Hello</h1>
			<p class="centerText bigText">We love hearing from you <i class="twa twa-heart"></i>. You are always welcome to join us online through our <a href="#">Facebook</a>, <a href="#">Twitter</a> and <a href="#">Instagram</a>. Or, you can just use the below form to send a direct email to info@nicebox.co</p>

      <p class="centerText bigText"><?php if ($check == "sent"){echo 'Message has been sent.';}?></p>

    <form name="form" class="form-field" id="form" method="POST">

      <div class="container">
        <div class="large12">
          <label for="email">Email:</label>
          <p><input class="bigText" type="email" id="email" placeholder="Your email address" name="email"/></p>
        </div>
      </div>

      <div class="container">
        <div class="large12">
          <p>
            <label for="message">Message:</label>
            <textarea id="message" class="input bigText" name="message" placeholder="Your message" name="message"></textarea>
          </p>
        </div>
      </div>

      <div class="container">
        <div class="large12">
          <input id="submit_button" type="submit" class="biggerText bigButton noLineHeight fullButton" value="Send" name="submit"/>
        </div>
      </div>

    </form>

		</div>
	</div>


<?php include 'includes/footer.php'; ?>
