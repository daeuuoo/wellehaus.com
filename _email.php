<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'library/vendor/autoload.php';
require_once '_credential_smtp.php';

// Sanitize Post Data
$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$name = filter_var($_POST['your-name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['your-email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['your-title'], FILTER_SANITIZE_STRING);
$content = filter_var($_POST['your-content'], FILTER_SANITIZE_STRING);
$agree = filter_var($_POST['do-you-agree'], FILTER_SANITIZE_STRING);

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.worksmobile.com', 587, 'tls'))
  ->setUsername(EMAIL)
  ->setPassword(PASS)
  ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
  ->setFrom(['info@wellehaus.com' => 'welle CS'])
  ->setTo(['daniel.choi@wellehaus.com' => 'welle DC'])
  ->setReplyTo([$email])
  ->setBody($content)
  ;

// Send the message

if($mailer->send($message)) {
    echo "Thank you for contacting us. We will get back to you as quickly as possible";
} else {
    echo "Failed to send..";
}
?> 