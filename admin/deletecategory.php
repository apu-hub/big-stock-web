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
$table = "category_tbl";

$obj->delete($table, $id);

// echo "success";
$session->with("danger", "Category Deleted");
header("location:showcategory.php");
