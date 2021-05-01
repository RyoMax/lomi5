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
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = $_POST['sub'];
$message = $_POST['message'];
$headers = 'From:'. $email2 . "rn"; // Sender's Email
$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
if (!mail("info@lomi5.de", "Neue Nutzeranfrage", $message, $headers)) {
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