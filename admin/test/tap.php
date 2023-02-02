<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
?>
    <form target="_blank" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="file" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
<?php
    exit();
}


require_once(__DIR__ . "/ImageHandler.php");


$imageShopPHP = new ImageShopPHP();
// save image
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
    "text_string" => "Drwfix.com . DRW63c822a8db961",
    "size" => 2.1,
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
$file_name = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
$destination = __DIR__ . "/" . "upload/" . $file_name;
$config = [
    "source" => $out_image, // GdImage
    "destination" => $destination, // Destination Path
];
$imageShopPHP->saveImage($config);

header('Content-type: image/jpg');
imagejpeg($out_image);
imagedestroy($out_image);

exit();
// $config['source_image'] = $file_path;
// $config['new_image'] = $file_path;
// $config['wm_text'] = 'Copyright 2006 - John Doe';
// $config['wm_type'] = 'text';
// // $config['wm_font_path'] = './fonts/Kadwa/Kadwa-Bold.ttf';
// $config['wm_font_path'] = __DIR__.'/Kadwa-Bold.ttf';
// $config['wm_font_size'] = '16';
// $config['wm_font_color'] = 'ffffff';
// $config['wm_vrt_alignment'] = 'bottom';
// $config['wm_hor_alignment'] = 'center';
// $config['wm_padding'] = '20';

// $image_lib->initialize($config);

// $image_lib->watermark();
