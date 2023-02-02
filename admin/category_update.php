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
  Utils::htmlRedirect('index.php',"Unauthorized");
}

$table = "category_tbl";

$cid = Utils::cleaner($_POST['id'] ?? 0);

$data = array(
  "category_name" => Utils::cleaner($_POST['category_name'] ?? ""),
  "category_tags" => Utils::cleaner($_POST['category_tags'] ?? ""),
  "image" => Utils::cleaner($_POST['image'] ?? ""),
);

if ($_FILES['file']['name'] != '') {
  $file_name = $_FILES['file']['name']; //this is image name
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp, "upload/" . $file_name);

  $data["image"] = $file_name;
}

$obj->update($table, $data, $cid);
$session->with("info", "Category Updated");
header("location:editcategory.php?id=" . $cid);
