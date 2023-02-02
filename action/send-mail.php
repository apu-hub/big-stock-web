<?php

require_once("./mailer.php");

// TODO MAILER
$email="sarkarchayan71@gmail.com";
$first_name="aka";
$subject = "Reset Password";
$payload = array(
    "Password_Reset_URL" => "https://thebigstock.com?dvbhhkd=sdjvhbhksd"
);

// ! change name
$templateName = "forget_password";
$status=sendMailTo(
    $email,
    $first_name,
    $subject,
    $payload,
    $templateName
);
var_dump($status);
