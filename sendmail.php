<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(
        !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['message'])
    ){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];


        $to = "info@pmdinnovation.com";
        $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nsubject: {$subject} \nMessage: {$message}";
        $headers = "From: {$email}"."\r\n".'Content-Type: text/plain; charset=utf-8'."\r\n";
        


        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message.";
        }
    }
}

  
// Checking valid form is submitted or not
if (isset($_POST['submit_btn'])) {
    
    // Storing name in $name variable
    $name = $_POST['name'];
  
    // Storing google recaptcha response
    // in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];

    // Put secret key here, which we get
    // from google console
    $secret_key = '6LcYTsgqAAAAABtQHS9GfeTxfbuDNyNPmd7yCnhW';

    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;

    // Making request to verify captcha
    $response = file_get_contents($url);

    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);

    // Checking, if response is true or not
    if ($response->success == true) {
        echo '<script>alert("Google reCAPTACHA verified")</script>';
    } else {
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Contact Form Submission</title>
       

<style>
    
input {
 width: 9em;
 height: 3em;
 margin: 10px;
 border-radius: 30em;
 font-size: 15px;
 font-family: inherit;
 border: none;
 position: relative;
 overflow: hidden;
 z-index: 1;
 box-shadow: #0d64be 0px 10px 10px -5px;
}



</style>
</head>
    <body>
<form action="contact.html" method="post">
<input type='submit' name='submit' value="Return" class='button-class' />
</form>

</body>
</html>
