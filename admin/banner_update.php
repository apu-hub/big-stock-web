<?php
session_start();

require_once(__DIR__ . "/ImageHandler.php");
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

$bannerID = Utils::cleaner($_POST['id'] ?? "");
$name = Utils::cleaner($_POST['name'] ?? "");
$image_name = Utils::cleaner($_FILES['file']['name']);

$data = array(
	"name" => $name,
);

if ($_FILES['file']['name'] != "") {
	$target_file = "upload/banner/" . $_FILES['file']['name'];
	if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		$session->with("warning", "Image Upload Fail");
		Utils::phpRedirect("editbanner.php");
	}
	$data['image_name'] = $_FILES['file']['name'];
}

$table = "banner_info";

$obj->update($table, $data, $bannerID);
$session->with("info", "Banner Updated");
Utils::phpRedirect('editbanner.php?id=' . $bannerID);
