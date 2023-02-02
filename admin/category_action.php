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

$table = "category_tbl";
if (isset($_FILES['file'])) {
   $file_name = $_FILES['file']['name'];
   $file_size = $_FILES['file']['size'];
   $file_tmp = $_FILES['file']['tmp_name'];
   $file_type = $_FILES['file']['type'];
   move_uploaded_file($file_tmp, "upload/" . $file_name);
   $catname = $_POST['categort_name'];
   $data = array(

      "category_name" => $_POST['category_name'],
      "category_tags" => $_POST['category_tags'],
      'image' => $file_name


   );

   $obj->insert($table, $data);
   $session->with("success", "Category Created");
   header("location:addcategory.php");
} else {
   $session->with("warning", "Upload Failed");
   echo "uploaded failed";
}
