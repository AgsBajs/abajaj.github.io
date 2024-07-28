<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validate Inputs
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email_address = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if(!$name || !$email_address || !$phone || !$message) {
    echo "No arguments Provided!";
    return false;
}

// Create the email and send the message
$to = 'bajajagampreet@gmail.com'; // Your email address
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\nHere are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@example.com\n"; // Replace with your domain's email
$headers .= "Reply-To: $email_address";

if (mail($to, $email_subject, $email_body, $headers)) {
    echo 'Message sent successfully.';
} else {
    echo 'Message sending failed.';
}
return true;
?>
