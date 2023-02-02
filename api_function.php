<?php


$imageViewCounter = function () {
    include_once('function.php');
    $obj = new Operations();
    $hashID = Utils::cleaner($_REQUEST['hash_id'] ?? "");
    $obj->dbSQL("UPDATE `image_tbl` SET `view_count` = `view_count` + 1 WHERE hash_id = '$hashID'");
};


$imageDownloadCounter = function () {
    include_once('function.php');
    $obj = new Operations();
    $hashID = Utils::cleaner($_REQUEST['hash_id'] ?? "");
    $obj->dbSQL("UPDATE `image_tbl` SET `download_count` = `download_count` + 1 WHERE hash_id = '$hashID'");
};