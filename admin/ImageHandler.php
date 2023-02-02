<?php

/**
 * Image file handling class
 * 
 * For update check https://github.com/apu-hub/image-shop-php
 * 
 * Report any issue here https://apu-hub.web.app/#contact
 */
class ImageShopPHP
{
    private $contentPath;
    private $imagePath;
    private $imageName;
    private $imageSize;
    private $imageType;
    private $out_image;

    public function __construct()
    {
        $this->contentPath = dirname($_SERVER['DOCUMENT_ROOT']) . "/content";
    }

    /**
     * Image Saver
     * 
     * save POST request image
     * 
     * single image supported
     */
    public function getFromFiles($fileName = "file")
    {
        $this->imageName = $_FILES[$fileName]["name"];
        $this->imageSize = $_FILES[$fileName]["size"];
        $this->imagePath = $_FILES[$fileName]["tmp_name"];
        $this->imageType = $_FILES[$fileName]["type"];
    }

    public function saveFile($newName = null, $savePath = null)
    {
        if ($savePath == null)
            $savePath = $this->contentPath;

        if ($newName == null)
            $newName = $this->imageName;

        $distPath = $savePath . "/" . $newName;

        if (!move_uploaded_file($this->imagePath, $distPath)) {
            throw new Exception("File Save Failed");
            exit();
        }
        // change image path
        $this->imagePath = $distPath;
    }

    public function saveImage($config = [
        "source" => null, // GdImage
        "destination" => null, // Destination Path
    ])
    {
        $source = $config["source"];
        $destination = $config["destination"];
        imagejpeg($source, $destination);
    }

    /**
     * Adding water to image
     * 
     * $savePath string only
     * 
     * without '/'  separator prefix
     */
    public function makeWaterMark($newName = null, $savePath = null)
    {
        // check image type
        $mimeType = explode('/', $this->imageType);
        $mimeType = end($mimeType);
        switch ($mimeType) {
            case 'png':
                $source = imagecreatefrompng($this->imagePath);
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($this->imagePath);
                break;
            case 'jpg':
                $source = imagecreatefromjpeg($this->imagePath);
                break;
            default:
                throw new Exception("Image Format Not Supported");
                exit();
        }

        // get raw image height & width 
        $rawImageWidth = imagesx($source);
        $rawImageHeight = imagesy($source);
        $blackImageLayer = imagecreate($rawImageWidth, $rawImageHeight);
        // imagedestroy($source);

        // Transparent background
        $whiteColor = imagecolorallocatealpha($source, 202, 204, 204, 80);
        $blackColor = imagecolorallocatealpha($blackImageLayer, 0, 0, 0, 100);

        // $text = "Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com";
        // $text2 = "com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com";
        // $text3 = "fix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com";
        // $text4 = "                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com                                         Drwfix.com";

        // $text = "drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix";
        // $text2 = "fix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix";
        // $text3 = "rwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix";
        // $text4 = "                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix                                         drwfix";

        $text = "Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix";
        $text2 = "fix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix";
        $text3 = "rwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix";
        $text4 = "                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix                                         Drwfix";

        $fontsize = ceil(($rawImageHeight / 100) * 1.7);
        $fontColor = $whiteColor;
        // $fontStyle = dirname(__FILE__) . '/Bangers-Regular.ttf';
        $fontStyle = dirname(__FILE__) . '/fonts/Kadwa/Kadwa-Bold.ttf';
        // $fontStyle = dirname(__FILE__) . '/fonts/ARIAL.TTF';

        $steper = "";
        $loopCount = ($rawImageHeight + $rawImageWidth) / (($fontsize * 20) + $fontsize);
        $offSetY = ceil(($rawImageHeight / 100) * 10);

        $last = 1;
        for ($i = 0; $i < ceil($loopCount); $i++) {
            if ($last == 4)
                $last = 1;
            else
                $last + 1;

            $positionY = (($fontsize * 20) * $i) + $offSetY;
            switch ($last) {
                case 1:
                    imagettftext($source, $fontsize, 45, 0, $positionY, $fontColor, $fontStyle, $text);
                    break;
                case 2:
                    imagettftext($source, $fontsize, 45, 0, $positionY, $fontColor, $fontStyle, $text2);
                    break;
                case 3:
                    imagettftext($source, $fontsize, 45, 0, $positionY, $fontColor, $fontStyle, $text3);
                    break;
                case 4:
                    imagettftext($source, $fontsize, 45, 0, $positionY, $fontColor, $fontStyle, $text4);
                    break;
            }
        }
        $this->out_image = $source;

        // if ($newName == null)
        //     $newName = $this->imageName;

        // if ($savePath != null) {
        //     // imagejpeg($source, $savePath . "/" . $newName);
        //     $wm_image = imagejpeg($source, $savePath . "/" . $newName);
        // } else {
        //     // imagejpeg($source, $this->imagePath);
        //     $wm_image = imagejpeg($source, $this->imagePath);
        // }
        // imagedestroy($source);
        return $source;
        // header("Location: https://thebigstock.com/bigstock/admin/upload/" . $this->imageName);
    }
    // /* Set RGB values for text
    //  *
    //  * First character is #, so we don't really need it.
    //  * Get the rest of the string and split it into 2-length
    //  * hex values:
    //  */
    // $txt_color = str_split(substr($this->wm_font_color, 1, 6), 2);
    // $txt_color = imagecolorclosest($src_img, hexdec($txt_color[0]), hexdec($txt_color[1]), hexdec($txt_color[2]));

    public function add_layer($config = [
        "source_image_a" => null, // GdImage
        "source_image_b" => null, // GdImage
        "horizontal_alignment" => "C",
        // Horizontal alignment: 
        // L=left, R=right, C=center
        "vertical_alignment" => "B",
        // Vertical alignment:
        // T=top, M=middle, B=bottom
        "position_x" => 0, // 50% of source image
        "position_y" => 0, // 50% of source image
    ])
    {
        $source_image_a = $config["source_image_a"];
        $source_image_b = $config["source_image_b"];

        $horizontal_alignment = $config["horizontal_alignment"];
        $vertical_alignment = $config["vertical_alignment"];

        $position_x = $config["position_x"];
        $position_y = $config["position_y"];

        // get source_image_a height & width 
        $source_image_a_width = imagesx($source_image_a);
        $source_image_a_height = imagesy($source_image_a);

        // get source_image_b height & width 
        $source_image_b_width = imagesx($source_image_b);
        $source_image_b_height = imagesy($source_image_b);

        $SRC_X = 0;
        $SRC_Y = 0;
        switch ($vertical_alignment) {
            case 'B':
                // Vertical Bottom
                $SRC_X +=  0;
                $SRC_Y += $source_image_a_height - $source_image_b_height;
                break;
            case 'M':
                // Vertical Middle
                $SRC_X +=  0;
                $SRC_Y += ($source_image_a_height / 2) - ($source_image_b_height / 2);
                break;
            case 'T':
                // Vertical Top
                $SRC_X +=  0;
                $SRC_Y += 0;
                break;
                // default:
                //     throw new Exception("Vertical Not Supported");
                //     exit();
        }
        switch ($horizontal_alignment) {
            case 'L':
                // Horizontal Left
                $SRC_X +=  0;
                $SRC_Y +=  0;
                break;
            case 'C':
                // Horizontal Center
                $SRC_X +=  ($source_image_a_width - $source_image_b_width) / 2;
                $SRC_Y += 0;
                break;
            case 'R':
                // Horizontal Right
                $SRC_X +=  $source_image_a_width - $source_image_b_width;
                $SRC_Y += 0;
                break;
                // default:
                //     throw new Exception("Horizontal Not Supported");
                //     exit();
        }
        // } else {
        //     $overlay_SRC_X =  ($source_image_width / 100) * $overlay_position_x;
        //     $overlay_SRC_Y = ($source_image_height / 100) * $overlay_position_y;
        //     //imagesy($overlay_image);
        // }

        imagecopy($source_image_a, $source_image_b, $SRC_X, $SRC_Y, 0, 0, $source_image_b_width, $source_image_b_height);
        $this->out_image = $source_image_a;
        return $source_image_a;
    }

    public function create_overlay_from_source($config = [
        "source_image" => null, // GdImage
        "overlay_width" => 50, // 50% of source image
        "overlay_height" => 50, // 50% of source image
    ])
    {
        $source_image = $config["source_image"];

        $overlay_width = $config["overlay_width"];
        $overlay_height = $config["overlay_height"];

        // get raw image height & width 
        $source_image_width = imagesx($source_image);
        $source_image_height = imagesy($source_image);

        // create stamp png
        $overlay_image_width = ($source_image_width / 100) * $overlay_width;
        $overlay_image_height = ($source_image_height / 100) * $overlay_height;

        $overlay_image = imagecreatetruecolor($overlay_image_width, $overlay_image_height);
        $white_color = imagecolorallocate($overlay_image, 255, 255, 255);
        imagefill($overlay_image, 0, 0, $white_color);

        $this->out_image = $overlay_image;
        return $overlay_image;
    }

    public function add_overlay($config = [
        "source_image" => null, // GdImage
        "overlay_width" => 50, // 50% of source image
        "overlay_height" => 50, // 50% of source image
        "overlay_horizontal_alignment" => "C",
        // Horizontal alignment: 
        // L=left, R=right, C=center
        "overlay_vertical_alignment" => "B",
        // Vertical alignment:
        // T=top, M=middle, B=bottom
        "overlay_position_x" => 0, // 50% of source image
        "overlay_position_y" => 0, // 50% of source image
    ])
    {
        $source_image = $config["source_image"];

        $overlay_width = $config["overlay_width"];
        $overlay_height = $config["overlay_height"];

        $overlay_horizontal_alignment = $config["overlay_horizontal_alignment"];
        $overlay_vertical_alignment = $config["overlay_vertical_alignment"];

        $overlay_position_x = $config["overlay_position_x"];
        $overlay_position_y = $config["overlay_position_y"];

        $textSize = 2; // init => 5
        $textPXoff = 25;
        $textPYoff = 0;

        // ? those are int value
        $textAngleoff = 0;

        // get raw image height & width 
        $source_image_width = imagesx($source_image);
        $source_image_height = imagesy($source_image);

        // create stamp png
        $overlay_image_width = ($source_image_width / 100) * $overlay_width;
        $overlay_image_height = ($source_image_height / 100) * $overlay_height;

        $overlay_image = imagecreatetruecolor($overlay_image_width, $overlay_image_height);
        $white_color = imagecolorallocate($overlay_image, 255, 255, 255);
        imagefill($overlay_image, 0, 0, $white_color);


        // ###### add overlay ###### \\
        $overlay_DST_X = imagesx($overlay_image);
        $overlay_DST_Y = imagesy($overlay_image);

        // overlay position
        // if ($overlay_horizontal_alignment != "") {
        $overlay_SRC_X = 0;
        $overlay_SRC_Y = 0;
        switch ($overlay_vertical_alignment) {
            case 'B':
                // Vertical Bottom
                $overlay_SRC_X =  0;
                $overlay_SRC_Y = ($source_image_height / 100) * (100 - $overlay_height);
                break;
            case 'M':
                // Vertical Middle
                $overlay_SRC_X =  0;
                $overlay_SRC_Y = ($source_image_height / 100) * (50 - ($overlay_height / 2));
                break;
            case 'T':
                // Vertical Top
                $overlay_SRC_X =  0;
                $overlay_SRC_Y = 0;
                break;
            default:
                throw new Exception("Vertical Not Supported");
                exit();
        }
        switch ($overlay_horizontal_alignment) {
            case 'L':
                // Horizontal Left
                $overlay_SRC_X +=  0;
                $overlay_SRC_Y +=  0;
                break;
            case 'C':
                // Horizontal Center
                $overlay_SRC_X +=  ($source_image_width - $overlay_image_width) / 2;
                $overlay_SRC_Y += 0;
                break;
            case 'R':
                // Horizontal Right
                $overlay_SRC_X +=  $source_image_width - $overlay_image_width;
                $overlay_SRC_Y += 0;
                break;
            default:
                throw new Exception("Horizontal Not Supported");
                exit();
        }
        // } else {
        //     $overlay_SRC_X =  ($source_image_width / 100) * $overlay_position_x;
        //     $overlay_SRC_Y = ($source_image_height / 100) * $overlay_position_y;
        //     //imagesy($overlay_image);
        // }

        imagecopy($source_image, $overlay_image, $overlay_SRC_X, $overlay_SRC_Y, 0, 0, $overlay_DST_X, $overlay_DST_Y);
        $this->out_image = $source_image;
        return $source_image;
    }

    public function create_text_layer_from_source($config = [
        "source_image" => null, // GdImage
        "text_string" => "",
        "size" => 5,
        "horizontal_alignment" => "C",
        // Horizontal alignment: 
        // L=left, R=right, C=center
        "vertical_alignment" => "B",
        // Vertical alignment:
        // T=top, M=middle, B=bottom
    ])
    {
        $source_image = $config["source_image"];

        $text_string = $config["text_string"];
        $size = $config["size"];

        $horizontal_alignment = $config["horizontal_alignment"];
        $vertical_alignment = $config["vertical_alignment"];

        // get raw image height & width 
        $source_image_width = imagesx($source_image);
        $source_image_height = imagesy($source_image);

        // Transparent background
        $text_layer = imagecreate($source_image_width, $source_image_height);
        $blackColorAlpha = imagecolorallocatealpha($text_layer, 0, 0, 0, 127);
        $blackColor = imagecolorallocate($text_layer, 50, 50, 50);
        imagecolortransparent($text_layer, $blackColorAlpha);

        if ($source_image_height > $source_image_width) {
            // portrait 
            $fontsize = ceil(($source_image_width / 100) *  $size);
        } else {
            // landscape
            $fontsize = ceil(($source_image_height / 100) *  $size);
        }

        $fontAngle = 0;
        $fontColor = $blackColor;
        // $fontStyle = dirname(__FILE__) . '/fonts/Kadwa/Kadwa-Bold.ttf';
        $fontStyle = dirname(__FILE__) . '/fonts/ARIAL.TTF';

        $temp = imagettfbbox($fontsize, 0, $fontStyle, $text_string);
        // $temp = $temp[2] - $temp[0];
        $font_width = $temp[2] - $temp[0];
        $font_height = $temp[1] - $temp[7];
        // echo $source_image_height,"<br>";
        // echo $font_height,"<br>";
        // exit;
        // $font_width = ($temp[2] - $temp[0]) / strlen($text_string);
        // $font_height = ($temp[2] - $temp[0]) / strlen($text_string);

        $SRC_X = 0;
        $SRC_Y = 0;
        switch ($vertical_alignment) {
            case 'B':
                // Vertical Bottom
                $SRC_X +=  0;
                $limiter = ($source_image_height > $source_image_width) ? 2 : 4;
                $SRC_Y += $source_image_height - ($font_height / $limiter);
                // $SRC_Y += $source_image_height;
                break;
            case 'M':
                // Vertical Middle
                $SRC_X +=  0;
                $SRC_Y += ($source_image_height / 2) - ($font_width / 2);
                break;
            case 'T':
                // Vertical Top
                $SRC_X +=  0;
                $SRC_Y += 0;
                break;
                // default:
                //     throw new Exception("Vertical Not Supported");
                //     exit();
        }
        switch ($horizontal_alignment) {
            case 'L':
                // Horizontal Left
                $SRC_X +=  0;
                $SRC_Y +=  0;
                break;
            case 'C':
                // Horizontal Center
                $SRC_X +=  ($source_image_width - $font_width) / 2;
                $SRC_Y += 0;
                break;
            case 'R':
                // Horizontal Right
                $SRC_X +=  $source_image_width - $font_width;
                $SRC_Y += 0;
                break;
                // default:
                //     throw new Exception("Horizontal Not Supported");
                //     exit();
        }

        imagettftext($text_layer, $fontsize, $fontAngle, $SRC_X, $SRC_Y, $fontColor, $fontStyle, $text_string);
        return $text_layer;
    }

    /**
     * Stream original image
     * 
     * $imagePath string only
     * 
     * without '/'  separator prefix
     */
    public function stream($imagePath)
    {
        $this->imagePath = $this->contentPath . "/" . $imagePath;

        if (!file_exists($this->imagePath)) {
            echo "Image Not Found";
            return;
        }

        $image = file_get_contents($this->imagePath);

        $this->imageName = explode('/', $this->imagePath);
        $this->imageName = end($this->imageName);

        $mimeType = explode('.', $this->imageName);
        $mimeType = end($mimeType);

        switch ($mimeType) {
            case 'png':
                $this->imageType = "image/png";
                break;
            case 'jpeg':
                $this->imageType = "image/jpeg";
                break;
            case 'jpg':
                $this->imageType = "image/jpeg";
                break;
            default:
                throw new Exception("Image Format Not Supported");
                exit();
        }

        header('Content-type: ' . $this->imageType);
        header('Content-disposition: inline; filename="' . $this->imageName . '"');
        echo $image;
    }

    /**
     * Forced Download original image
     * 
     * $imagePath string only
     * 
     * without '/'  separator prefix
     */
    public function download($fileName, $filePath = null)
    {
        if ($filePath == null)
            $filePath = $this->contentPath;

        $this->imagePath = $filePath . "/" . $fileName;

        if (!file_exists($this->imagePath)) {
            echo "File Not Found";
            return;
        }

        $image = file_get_contents($this->imagePath);

        $this->imageName = explode('/', $this->imagePath);
        $this->imageName = end($this->imageName);

        $this->imageSize   = filesize($this->imagePath);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $this->imageName . '"');
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . $this->imageSize);
        echo $image;
    }

    /**
     * Compress original image
     * 
     * $sourse $destination string only
     * 
     * without '/'  separator prefix
     */
    public function compressJPEG($source, $destination, $quality = null)
    {
        $this->imagePath = $this->contentPath . "/" . $source;


        $this->imageName = explode('/', $this->imagePath);
        $this->imageName = end($this->imageName);

        $mimeType = explode('.', $this->imageName);
        $mimeType = end($mimeType);

        switch ($mimeType) {
            case 'png':
                $this->imageType = "image/png";
                break;
            case 'jpeg':
                $this->imageType = "image/jpeg";
                break;
            case 'jpg':
                $this->imageType = "image/jpeg";
                break;
            default:
                throw new Exception("Image Format Not Supported");
                exit();
        }

        if ($quality != null) {
            imagejpeg($this->imagePath, $destination, $quality);
        } else {
            echoBrExit("", $quality, true);
            imagejpeg($this->imagePath, $destination);
        }

        $image = file_get_contents($destination);
        header('Content-type: image/jpeg');
        header('Content-disposition: inline; filename="' . $this->imageName . '"');
        echo $image;
    }
    public function getContentPath()
    {
        return $this->contentPath;
    }
    public function getImageName()
    {
        return $this->imageName;
    }
    public function getImageType()
    {
        return $this->imageType;
    }
    public function getImagePath()
    {
        return $this->imagePath;
    }
}


function echoBrExit($title = "", $var = "", $close = false)
{
    echo "<br> ", $title, $var;
    if ($close) exit();
}
