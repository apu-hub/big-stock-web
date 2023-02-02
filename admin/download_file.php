<?php
session_start();
require_once("./ImageHandler.php");
include('function.php');
$obj =  new Operations();

$redirect = Utils::cleaner($_GET['redirect'] ?? "");

if (!isset($_SESSION['hash_id']) || $_SESSION['hash_id'] == "") {
    Utils::htmlRedirect($redirect, 'Unauthorized Access');
}

$hashID = $_SESSION['hash_id'];

// fecth image information
$row = $obj->getSingle('image_tbl', "WHERE hash_id = '" . $hashID . "'");

// redirect
if (!$row) {
    Utils::htmlRedirect($redirect, 'Image Not Found');
}

$imageName = trim($row['file']);

if (empty($imageName)) {
    Utils::htmlRedirect($redirect, 'Image Not Found');
}

$imageShopPHP = new ImageShopPHP();
$imageShopPHP->download($imageName);
