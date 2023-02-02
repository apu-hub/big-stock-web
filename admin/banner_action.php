<?php
session_start();

include(__DIR__ . '/function.php');
$obj =  new Operations();
$session = new SessionClass();

// Authenticate
$user_id = 0;
if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
}
if (!$user_id) {
    Utils::htmlRedirect('index.php', "Unauthorized");
}

$target_file = "upload/banner/" . $_FILES['file']['name'];

if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    $session->with("warning", "Image Upload Fail");
    Utils::phpRedirect("addbanner.php");
}

$name = Utils::cleaner($_POST['name'] ?? "");
$image_name = Utils::cleaner($_FILES['file']['name']);

$table = "banner_info";

$data = array(
    "name" => $name,
    "image_name" => $image_name,
);

$obj->insert($table, $data);

$session->with("success", "Banner Created");
Utils::phpRedirect("addbanner.php");
