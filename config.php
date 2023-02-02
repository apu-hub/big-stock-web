<?php

require_once(__DIR__."/vendor/autoload.php");
//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('179434008382-1vjsrbueul6j40f74s1r8ck0lo8vslih.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://thebigstock.com/bigstock/login.php');


$google_client->addScope('email');

$google_client->addScope('profile');



?>