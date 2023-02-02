<?php

require_once("./ImageHandler.php");


$imageName = $_GET['file'] ?? null;
$quality = $_GET['q'] ?? null;

if ($imageName == null || $quality == null)
exit();

$imageShopPHP = new ImageShopPHP();
$imageShopPHP->compressJPEG($imageName, "upload/" . $imageName, $quality);
