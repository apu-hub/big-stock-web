<?php
include('function.php');
include('api_function.php');

$obj = new Operations();
$functionName = Utils::cleaner($_REQUEST['function'] ?? "");



$functionList = [
    "image_view_counter" => $imageViewCounter,
    "image_download_counter" => $imageDownloadCounter,
];


foreach ($functionList as $key => $value) {
    if ($functionName == $key) {
        $value();
        break;
    }
}
