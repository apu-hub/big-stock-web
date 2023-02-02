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

// if(isset($_FILES['file'])){
   // $file_name = $_FILES['file']['name'];
// $file_size = $_FILES['file']['size'];
// $file_tmp = $_FILES['file']['tmp_name'];
// $file_type = $_FILES['file']['type'];
// move_uploaded_file($file_tmp,"upload/".$file_name);
// }

$data = array(
   "category_id" => $_POST['category_id'],
   "tags" => $_POST['tags'],
   'image' => ""
);

$table = "tags_tbl";
$obj->insert($table, $data);
$session->with("success", "Tags Created");
header("location:addtags.php");
