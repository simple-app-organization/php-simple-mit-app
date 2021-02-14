<?php
require_once __DIR__ . './../autoload.php'; 

use SimpleApp\Configs;
$baseConfig = new Configs\Base;

$emailConfig = $baseConfig->getEmailConfig();

// retrieve form values
$firstName  = filter_var ( $_POST['firstName'],     FILTER_SANITIZE_STRING );
$lastName   = filter_var ( $_POST['lastName'],      FILTER_SANITIZE_STRING );
$email      = filter_var ( $_POST['email'],         FILTER_SANITIZE_EMAIL );
$message    = filter_var ( $_POST['message'],       FILTER_SANITIZE_STRING );
$privacy    = filter_var ( $_POST['privacy'][0],    FILTER_SANITIZE_STRING );

// echo "firstName: ". $firstName;
// echo "lastName: ". $lastName;
// echo "email: ". $email;
// echo "message: ". $message;
// echo "privacy: ". $privacy;
// die('stop - logics/send.php');

$to      = $emailConfig['to'];
$subject = 'Contact from web site';
$headers = $emailConfig['headers'];

// Message in heredic syntax
$body = <<<MESSAGE
firstName: $firstName
lastName: $lastName
email: $email
message: $message
privacy: $privacy
MESSAGE;

// Commented for demo
// mail($to, $subject, $body, $headers);

header("location: ./../contact/confirm.php?name=". $firstName ."&surname=". $lastName);