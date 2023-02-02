<?php include("include/header.php") ?>
<?php
// $categoryname = $_GET['category_name'];
// if ($categoryname == '') {
//     $result = $obj->getAll("category_tbl");
// } else {
//     $where = "WHERE category_name like '%" . $_GET['category_name'] . "%'";
//     //  $where ="WHERE category_name = $categoryname";
//     $result = $obj->getList('category_tbl', $where);
// }

// get query
$categoryName = $_POST['category_name'] ?? "";
$categoryID = $_GET['category_id'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $categoryName != "") {
    // if POST and category_name not empty
    $where = "WHERE category_name like '%" . $categoryName . "%'";
    $result = $obj->getList('category_tbl', $where);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $categoryID != "") {
    // if GET and category_id not empty
    $where = "WHERE id = " . $categoryID;
    $result = $obj->getList('category_tbl', $where);
} else {
    // fetch all
    $result = $obj->getAll("category_tbl");
}

?>
<main class="catemain">
    <section class="container-fluid catagorysection">
        <form action="category.php" method="post">

            <div class="container-xl searchbararae searchb">
                <!-- <div class="cartagorybox">
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle ctgrydpdn" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Select Catagory
                        </button>
                        <ul class="dropdown-menu " style="padding: 4px 10px">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Default radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Default
                                </label>
                            </div>
                            <hr>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Free
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label primium" for="flexCheckChecked">
                                    Premium
                                </label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Icons
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Photo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    PSD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Vector
                                </label>
                            </div>
                        </ul>
                    </div>
                </div>-->

                <div class="searchbarar">
                    <input class="searchinput" type="text" class="form-control" id="exampleInputText" name="category_name" aria-describedby="text" placeholder="Search Category" value="<?= $categoryName ?>">
                    <button class="btnsearch">Search</button>
                </div>
            </div>
        </form>

        <h1>CATEGORY</h1>
    </section>
    <?php

    foreach ($result as $results) {
        $where = "WHERE category_id = " . $results['id'];
        $tags = $obj->getList('tags_tbl', $where);
    ?>

        <section class="container-fluid catearea">
            <a href="category.php?category_id=<?php echo $results['id'] ?>">
                <h1><?php echo $results['category_name'] ?></h1>
            </a>

            <!-- <div class="container-xxl slick-carousel"> -->
            <section>
                <div class="container-xxl">
                    <div class="description">
                        <p>
                            <?php foreach ($tags as $tag) { ?>
                                <!-- Inside the containing div, add one div for each slide -->
                                <!-- <div class="imgcata"> -->
                                <!-- <a href="category_list.php?category_id=<?= $results['id'] ?>&tag_id=<?= $tag['id'] ?>"> -->
                                <!-- <img src="admin/upload/<?php echo $tag['image'] ?>" alt=""> -->
                                <!-- <h5><?php echo $tag['tags']; ?></h5> -->
                                <!-- </a> -->
                                <!-- </div>  -->
                                <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>&tag_id=<?php echo $tag['id'] ?>" class="tags">
                                    <?php echo ucwords($tag['tags']) ?>
                                </a>
                            <?php }
                            ?>
                        </p>
                    </div>
                </div>

            </section>
        </section>

    <?php } ?>

</main>
<?php include("include/footer.php") ?>