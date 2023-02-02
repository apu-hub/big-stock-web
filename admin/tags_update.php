<?php
session_start();
include('function.php');
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

$tid = Utils::cleaner($_POST['id']);
$data = array(
   "category_id" => Utils::cleaner($_POST['category_id']),
   "tags" => Utils::cleaner($_POST['tags']),
   //  "image"=>Utils::cleaner($_POST['previousimage']),
);

// if ($_FILES['file']['name'] != '') {
//    $file_name = $_FILES['file']['name'];
//    $file_size = $_FILES['file']['size'];
//    $file_tmp = $_FILES['file']['tmp_name'];
//    $file_type = $_FILES['file']['type'];
//    move_uploaded_file($file_tmp, "upload/" . $file_name);
//
//    $data['image']= $file_name;
// } 

$table = "tags_tbl";
$obj->update($table, $data, $tid);
$session->with("info", "Tags Updated");
header("location:showtags.php");
