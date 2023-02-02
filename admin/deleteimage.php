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

$id = Utils::cleaner($_GET['id']);
$table = "image_tbl";

$obj->delete($table, $id);

$session->with("danger", "Image Deleted");

header("location:showimage.php");
