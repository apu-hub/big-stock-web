<?php include("include/header.php") ?>

<?php
$imageID = $_GET['id'] ?? "";

$where = "WHERE id = " . $imageID;

$image = $obj->getSingle('image_tbl', $where);

?>



<main>
    <br><br><br><br><br>
    <?php
    print_r($image);
    ?>
    
    <!-- Array
(
    [id] => 15
    [category_id] => 5
    [tag_id] => 2
    [image_name] => ewdsx
    [image_description] => edsewd
    [image_price] => 333
    [image] => photo-1453728013993-6d66e9c9123a (1).jpg
    [file] => 
    [height] => 
    [width] => 
    [length] => 
    [added_by] => 1
    [date] => 2022-12-27 12:03:31
) -->
</main>

<?php include("include/footer.php") ?>