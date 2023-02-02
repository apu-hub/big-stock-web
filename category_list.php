<?php

use Monolog\Handler\Curl\Util;

include("include/header.php") ?>
<?php
// get query
$categoryID = Utils::cleaner($_GET['category_id'] ?? "");
$tagID = Utils::cleaner($_GET['tag_id'] ?? "");
$currentPageNumber = Utils::cleaner($_GET['page'] ?? 1);


// basic check
if ($tagID == "" || $categoryID == "") {
    echo "<script>window.location.href='/bigstock/category.php';</script>";
    exit;
}
// if current page samaller then 1
if ($currentPageNumber < 1)
    $currentPageNumber = 1;

// default image limit
$limitLength = 4;
// new offset
$fromOffset = $limitLength * ($currentPageNumber - 1);

// fetch category
$where = "WHERE id = " . $categoryID;
$category = $obj->getSingle('category_tbl', $where);

$categoryName = $category['category_name'];
$categoryID = $category['id'];

// no category found
if (!$category) {
    echo "<script>window.location.href='/bigstock/category.php';</script>";
    exit;
}

/// ashgdvckdhbk,jvk

// fetch tag
$where = "WHERE category_id = " . $categoryID;
$tags = $obj->getList('tags_tbl', $where);



// where gategory id and tag id
$where = "WHERE category_id = " . $categoryID;
$where .= " AND tag_id = " . $tagID;

// fetch all images
$totalImages = $obj->getCounts('image_tbl', $where);

// add limit and offset
$where .= " limit " . $limitLength . " offset " . $fromOffset;

// fetch images
$imageList = $obj->getList('image_tbl', $where);
?>


<main>
    <section class="container-fluid catagorysection">
        <h1><?= $categoryName ?>
        </h1>
        <p>EXTENSIVE RANGE OF PROFESSIONALLY TAKEN STOCK PHOTOS CAN BE USE ANYWHERE</p>
    </section>


    <section>
        <mytag hidden>
            <div class="container-xxl">
                <div class="row listarea">
                    <?php foreach ($tags as $tag) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                            <a <?= ($tagID == $tag['id']) ? 'style="color: #0dcaf0;"' : '' ?> href="category_list.php?category_id=<?= $categoryID ?>&tag_id=<?= $tag['id'] ?>"><?= $tag['tags']; ?></a><br>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>

    <section>
        <div class="container-xxl mt-4">
            <div class="buttons">
                <div class="list"><i class="fa fa-list"></i></div>
                <div class="grid"><i class="fa fa-th-large"></i></div>
            </div>
            <div class="wrapper" id="wrapper">
                <?php foreach ($imageList as $img) { ?>
                    <div class="col">
                        <a href="download.php?id=<?= $img['hash_id'] ?>" class="card">
                            <div class="content">
                                <span class="title"><?= $img['image_name'] ?></span>
                                <span class="category"><?= $category['category_name'] ?></span>
                            </div>
                            <div class="image">
                                <img src="admin/upload/<?= $img['image'] ?>" alt="<?= $img['image_name'] ?>" />
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Image Not Found -->
    <?= (count($imageList) < 1) ? "<h2>nothing to show<h2>" : "" ?>

    <!-- Page Navigation -->
    <?php
    if ($totalImages > $limitLength) {
        // get page count by per page image limit
        $pageCount = 0;

        if (($totalImages % $limitLength) == 0) {
            $pageCount = $totalImages / $limitLength;
        } else {
            // round off max
            $pageCount = ceil(($totalImages / $limitLength));
        }

        $previous = $currentPageNumber - 1;
        $next = ($currentPageNumber * $limitLength) > $totalImages ? 1 : $currentPageNumber + 1;
    ?>
        <div class="container paginationarea">
            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    // hide for page 1
                    if ($currentPageNumber != 1) {
                    ?>
                        <li class="page-item ">
                            <a class="page-link" href="category_list.php?category_id=<?= $categoryID ?>&tag_id=<?= $tagID ?>&page=<?= $previous ?>">
                                Previous
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    for ($i = 1; $i <= $pageCount; $i++) {
                    ?>
                        <li class="page-item ">
                            <a class="page-link" <?= ($currentPageNumber == $i) ? 'style="color: white;background-color: #18cfab!important;"' : '' ?> href="category_list.php?category_id=<?= $categoryID ?>&tag_id=<?= $tagID ?>&page=<?= $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    // hide for last page
                    if ($currentPageNumber != $pageCount) {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="category_list.php?category_id=<?= $categoryID ?>&tag_id=<?= $tagID ?>&page=<?= $next ?>">
                                Next
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php
    }
    ?>

    <section>
        <div class="container-xxl">
            <div class="description">
                <p>Stock photography started in 1920s and is the supply of photographs, which are often licensed for specific uses. Many of freelancer photographers taking photos and add them on stock photography sites. <br> Motifbox provides a large collection of stock photographs. All photographs are available free and you can use it to add quality to your projects.&nbsp;&nbsp;</p>
                <p>
                    <?php
                    // others category tags
                    // $categoryID = $_GET['category_id'];
                    $where = "WHERE category_id !=$categoryID";
                    $tags = $obj->getList('tags_tbl', $where);
                    if (!empty($tags)) {
                        foreach ($tags as $tag) {
                    ?>
                            <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>&tag_id=<?php echo $tag['id'] ?>" class="tags">
                                <?php echo ucwords($tag['tags']) ?>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
    </section>
</main>

<?php include("include/footer.php") ?>



<script>
    var wrapper = document.getElementById("wrapper");

    document.addEventListener("click", function(event) {
        if (!event.target.matches(".list")) return;

        // List view
        event.preventDefault();
        wrapper.classList.add("list");
    });

    document.addEventListener("click", function(event) {
        if (!event.target.matches(".grid")) return;

        // List view
        event.preventDefault();
        wrapper.classList.remove("list");
    });
</script>

<script>
    var elements = document.getElementsByClassName("column");

    var i;

    function one() {
        for (i = 0; i < elements.length; i++) {
            elements[i].style.msFlex = "100%";
            elements[i].style.flex = "100%";
        }
    }

    function two() {
        for (i = 0; i < elements.length; i++) {
            elements[i].style.msFlex = "50%";
            elements[i].style.flex = "50%";
        }
    }

    // Four images side by side
    function four() {
        for (i = 0; i < elements.length; i++) {
            elements[i].style.msFlex = "25%";
            elements[i].style.flex = "25%";
        }
    }

    // Add active class to the current button (highlight it)
    var header = document.getElementById("myHeader");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>