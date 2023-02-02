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

// genetare hash id
// $hashID = "DRW" . uniqid();
$hashID = "DRW" . Utils::randomNumber(8);

$imageShopPHP = new ImageShopPHP();
if ($_FILES['file']['name'] != '') {
    // save image
    // $imageShopPHP->getFromFiles();
    // $imageType = explode("/", $imageShopPHP->getImageType());
    // $imageType = end($imageType);
    // $file_name = $hashID . "." . $imageType;
    // $file_name = $hashID;
    // $imageShopPHP->makeWaterMark($file_name, "upload");
    
    // save image
    $file_name = $hashID;
    $imageShopPHP->getFromFiles();
    $imageType = explode("/", $imageShopPHP->getImageType());
    $watermark_image = $imageShopPHP->makeWaterMark(null, "upload");

    // create layer from watermart image
    $config = [
        "source_image" => $watermark_image,
        "overlay_width" => 100,
        "overlay_height" => 5,
    ];
    $white_layer = $imageShopPHP->create_overlay_from_source($config);

    // add layer two layer
    $config = [
        "source_image_a" => $watermark_image, // GdImage
        "source_image_b" => $white_layer, // GdImage
        "horizontal_alignment" => "C",
        "vertical_alignment" => "B",
        "position_x" => 0, // 50% of source image
        "position_y" => 0, // 50% of source image
    ];
    $image_with_tape = $imageShopPHP->add_layer($config);

    // create text layer from watermart image
    $config = [
        "source_image" => $watermark_image,
        "text_string" => "drwfix.com   .   $hashID",
        "size" => 3,
        "horizontal_alignment" => "C",
        "vertical_alignment" => "B",
    ];
    $text_image = $imageShopPHP->create_text_layer_from_source($config);

    // add layer two layer
    $config = [
        "source_image_a" => $watermark_image, // GdImage
        "source_image_b" => $text_image, // GdImage
        "horizontal_alignment" => "O",
        "vertical_alignment" => "O",
        "position_x" => 0, // 50% of source image
        "position_y" => 0, // 50% of source image
    ];
    $out_image = $imageShopPHP->add_layer($config);

    // save image
    $destination = __DIR__ . "/" . "upload/" . $file_name;
    $config = [
        "source" => $out_image, // GdImage
        "destination" => $destination, // Destination Path
    ];
    $imageShopPHP->saveImage($config);
}

if ($_FILES['raw']['name'] != '') {
    // save raw
    $imageShopPHP->getFromFiles("raw");
    $fileType = explode(".", $imageShopPHP->getImageName());
    $fileType = end($fileType);
    $raw_file_name = $hashID . "-raw." . $fileType;
    $imageShopPHP->saveFile($raw_file_name);
}

$table = "image_tbl";

$data = array(
    "hash_id" => $hashID,
    "category_id" => $_POST['category_id'],
    "tag_id" => $_POST['tag_id'],
    "image_name" => $_POST['image_name'],
    "image_description" => $_POST['image_description'],
    "image_price" => $_POST['image_price'],
    "image" => $file_name,
    "file" => $raw_file_name,

    "added_by" => $user_id,
);

$obj->insert($table, $data);

$session->with("success", "Image Created");
Utils::phpRedirect("addimage.php");
