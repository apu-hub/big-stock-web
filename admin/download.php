<?php
session_start();
require_once("./ImageHandler.php");
include('function.php');
$obj =  new Operations();

// ! ###########
// Add Authentication

// clean previous session
$_SESSION['hash_id'] = "";

// ============= trigger download ============= \\
$hashID = Utils::cleaner($_GET['id'] ?? "0");

// fetch image information
$where = "WHERE hash_id = '$hashID'";
$image = $obj->getSingle('image_tbl', $where);

// redirect to home page
if (!$image) {
    Utils::htmlRedirect('showimage.php', 'Image Not Found');
}

$_SESSION['hash_id'] = $hashID;
Utils::phpRedirect('download_file.php?redirect=showimage.php');
