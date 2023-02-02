<?php
require_once("./ImageHandler.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["file"]) && !empty($_GET["file"])) {
        if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "download") {
            $imageShopPHP = new ImageShopPHP();
            $imageShopPHP->download($_GET["file"]);
        } else {
            $imageShopPHP = new imageShopPHP();
            $imageShopPHP->stream($_GET["file"]);
        }
    } else {
?>
        <form target="_blank" method="post" enctype="multipart/form-data">
            <!-- <form method="post" enctype="multipart/form-data"> -->
            Select image to upload:
            <input type="file" name="file" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
<?php
    }
    exit();
}

$imageShopPHP = new ImageShopPHP();
$imageShopPHP->getFromFiles();
$imageShopPHP->makeWaterMark("upload");

