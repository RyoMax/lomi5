<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["name"] == "" || $_POST["email"] == "" || $_POST["message"] == ""){
    header("Location: https://www.lomi5.de/empty.html");
    die();
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['email'];
$from = "booking@lomi5.de";
$name = $_POST['name'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();


// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = "Neue Nutzeranfrage von ".$name; 
$mailText = utf8_encode($_POST['message']);
$message = '<html><head><meta charset="utf-8"></head><body style="background-color:#F9F5EC;>';
$message .= '<h1 style="color:#262626;">Hallo Henriette!</h1>';
$message .= '<h3 style="color:#262626;">'. $name . ' hat dir eine Anfrage geschickt.</h3';
$message .= '<p style="color:#262626;">Inhalt der Nachricht:</p';
$message .= '<p style="color:#262626;">' . $mailText . '</p';
$message .= '<p style="color:#262626;">E-Mail-Adresse vom Kunden:' . $email . '</p';
$message .= '</body></html>';
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
if (!mail("info@lomi5.de", $subject, $message, $headers)) {
    header("Location: https://www.lomi5.de/error.html");
    die();
 }
 else{
    header("Location: https://www.lomi5.de/success.html");
    die();

 }
}
}
}
?>



