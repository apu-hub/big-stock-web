<?php
session_start();
include(__DIR__ . '/function.php');
$obj =  new Operations();

$user_id = 0;
if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
}

$email = Utils::cleaner($_POST['email'] ?? "");
$password = md5(Utils::cleaner($_POST['password'] ?? ""));

// fetch Admin information
$table = "admin_tbl";
$where = "WHERE email = '" . $email . "'";
$result = $obj->getSingle($table, $where);

// account not found
if (!$result) {
  Utils::htmlRedirect('login.php', 'Account Not Found');
}

// password not match
if ($result['password'] != $password) {
  Utils::htmlRedirect('login.php', 'Email And Password Does Not Matched');
}

// set user session
$_SESSION['admin_id'] = $result['id'];
$_SESSION['admin_email'] = $email;

Utils::phpRedirect('dashboard.php');
