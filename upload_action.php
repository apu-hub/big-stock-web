<?php
session_start();
include('function.php');
$obj =  new Operations();
 $user_id = $_SESSION['id'];
$table = "image_tbl";
  if(isset($_FILES['file'])){
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      move_uploaded_file($file_tmp,"upload/".$file_name);
      $data = array(
        
	          "category_id"=>$_POST['category_id'],
	          "tag_id"=>$_POST['tag_id'],
            "image_name"=>$_POST['image_name'],
            "image_description"=>$_POST['image_description'],
            "image_price"=>$_POST['image_price'],
	          "image"=>$file_name,
            "length"=>$_POST['length'],
            "height"=>$_POST['height'],
            "width"=>$_POST['width'],
            "added_by"=>$user_id,

	);

$obj->insert($table,$data);
 header("location:index.php");
}else{
 echo "uploaded failed";
      }


?>