<?php
session_start();
include "function.php";
$Controller = new Operations;

$redirect = Utils::cleaner($_POST['redirect'] ?? "");
$email = Utils::cleaner($_POST['email'] ?? "");
$password = md5(Utils::cleaner($_POST['password'] ?? ""));

// fetch user information
$table = "user_tbl";
$where = "WHERE email = '" . $email . "'";
$result = $Controller->getSingle($table, $where);

// account not found
if (!$result) {
  Utils::htmlRedirect('login.php', 'Account Not Found');
}

// password not match
if ($result['password'] != $password) {
  Utils::htmlRedirect('login.php', 'Email And Password Does Not Matched');
}

// set user session
$_SESSION['id'] = $result['id'];

// redirect
if ($redirect != "") {
  Utils::phpRedirect($redirect);
}

Utils::phpRedirect('index.php');
