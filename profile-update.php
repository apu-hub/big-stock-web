<?php
session_start();
include(__DIR__ . '/function.php');
$obj =  new Operations();
$session = new SessionClass();

$user_id = 0;
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
}

// check login or not
if (!$user_id) {
    Utils::htmlRedirect('login.php', "USER NF");
}

// fetch user information
$user = $obj->getSingle('user_tbl', "WHERE id = '" . $user_id . "'");

// if user not found
if (!$user) {
    Utils::htmlRedirect('login.php', "SQL USER NF");
}

$firstName = Utils::cleaner($_POST['first_name'] ?? "");
$lastName = Utils::cleaner($_POST['last_name'] ?? "");
$email = Utils::cleaner($_POST['email'] ?? "");
$mobile = Utils::cleaner($_POST['mobile'] ?? "");
// $password = Utils::cleaner($_POST['password'] ?? "");


$data = array(
    'first_name' =>  $firstName,
    'last_name' => $lastName,
    'email' => $email,
    'mobile' => $mobile,
    // 'password' => md5($password)
);

$table = "user_tbl";
if ($_FILES['file']['name'] != '') {

    $ext =  explode("/", $_FILES['file']['type']);
    $ext = end($ext);

    $file_name = $user_id . "-profile-picture." . $ext;

    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, "images/profile/" . $file_name);

    $data['profile_picture'] = $file_name;
}

$obj->update($table, $data, $user_id);
Utils::htmlRedirect("profile.php", "Profile Successfully Updated");
