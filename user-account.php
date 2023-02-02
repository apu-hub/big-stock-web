<?php include("include/header.php") ?>
<?php

// get query
$currentPageNumber = Utils::cleaner($_GET['page'] ?? 1);

// check login or not
if (!$user_id) {
    Utils::htmlRedirect('login.php');
}

// fetch user information
$user = $obj->getSingle('user_tbl', "WHERE id = '" . $user_id . "'");

// if user not found
if (!$user) {
    Utils::htmlRedirect('login.php');
}

// if current page samaller then 1
if ($currentPageNumber < 1)
    $currentPageNumber = 1;

// default image limit
$limitLength = 4;
// new offset
$fromOffset = $limitLength * ($currentPageNumber - 1);

// where added by
$where = "WHERE added_by = $user_id";

// fetch all images
$totalImages = $obj->getCounts('image_tbl', $where);

// add limit and offset
$where .= " limit " . $limitLength . " offset " . $fromOffset;

// fetch images
$imageList = $obj->getList('image_tbl', $where);

?>
<main>

    <section class="container-fluid pppicarae">
        <div class="backimg">
            <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
        </div>
        <div class="profilepic">
            <img src="./images/profile/<?= $user['profile_picture'] ?? 'png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png' ?>" alt="">
        </div>
        <div class="nameand">
            <!--  <p>Design Contributions: <span>1265</span> Member Since <span>Apr 24, 2019</span></p>-->
        </div>
        <div class="nameand">
            <h1><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></h1>
            
            <p>
                Design Contributions: <span>1265</span> Member Since
                <span>Apr 24, 2019</span>
            </p>
           <div class="viewpdct"> <a class="btn loginbtn" href="profile.php">View Profile</a></div>
        </div>
    </section>
    <?php if (!empty($imageList)) { ?>
        <section class="container-xxl fordesktopone   userareaco">
            <h1 class="headingone">Your Latest Upload</h1>
            <div class="brawes-part-1">
                <div class="row">
                    <?php foreach ($imageList as $image) { ?>
                        <div class="col-md-2">
                            <div class="pt1imgbx usraccpost">
                                <a href="download.php?id=<?= $image['hash_id'] ?>">
                                    <img src="admin/upload/<?php echo $image['image'] ?>" alt="<?= $image['image'] ?? "" ?>">
                                </a>
                                <div class="vwdnld">
                                    <p><i class="fa-solid fa-eye"></i> <span>
                                            <?php
                                            $viewCount = $image['view_count'];

                                            if ($viewCount > 1000)
                                                echo ceil($viewCount / 1000), "K";
                                            else
                                                echo $viewCount;
                                            ?>
                                        </span></p>
                                    <p>
                                        <a href="checkout.php?id=<?= $image['hash_id'] ?>"><i class="fa-sharp fa-solid fa-download"></i></a>
                                        <span>
                                            <?php
                                            $downloadCount = $image['download_count'];

                                            if ($downloadCount > 1000)
                                                echo ceil($downloadCount / 1000), "K";
                                            else
                                                echo $downloadCount;
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="container-xxl  for-mobileone userareaco">
            <h1 class="headingone">Your Latest Upload</h1>
            <div class="brawes-part-1">
                <div class="row">
                    <?php foreach ($imageList as $image) { ?>
                        <div class="col-4 ">
                            <div class="pt1imgbx usraccpost">
                                <a href="download.php?id=<?= $image['hash_id'] ?>">
                                    <img src="admin/upload/<?php echo $image['image'] ?>" alt="<?= $image['image'] ?? "" ?>">
                                </a>
                                <div class="vwdnld">
                                    <p><i class="fa-solid fa-eye"></i>
                                        <span>
                                            <?php
                                            $viewCount = $image['view_count'];

                                            if ($viewCount > 1000)
                                                echo ceil($viewCount / 1000), "K";
                                            else
                                                echo $viewCount;
                                            ?>
                                        </span>
                                    </p>
                                    <a href="checkout.php?id=<?= $image['hash_id'] ?>"><i class="fa-sharp fa-solid fa-download"></i></a>
                                    <span>
                                        <?php
                                        $downloadCount = $image['download_count'];

                                        if ($downloadCount > 1000)
                                            echo ceil($downloadCount / 1000), "K";
                                        else
                                            echo $downloadCount;
                                        ?>
                                    </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>



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
                            <a class="page-link" href="user-account.php?page=<?= $previous ?>">
                                Previous
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    // for ($i = 1; $i <= $page2; $i++) {
                    for ($i = 1; $i <= $pageCount; $i++) {
                    ?>
                        <li class="page-item ">
                            <a class="page-link" <?= ($currentPageNumber == $i) ? 'style="color: white;background-color: #18cfab!important;"' : '' ?> href="user-account.php?page=<?= $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    // hide for last page
                    if ($currentPageNumber != $pageCount) {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="user-account.php?page=<?= $next ?>">
                                Next
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php } ?>


</main>

<footer>
    <div class="container-xxl footerarea">

        <div class="row py-5">
            <div class="col-md-3">
                <h4>Img Shop</h4>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam, excepturi.</p>
                <p><i class="fa-solid fa-location-pin"></i> 25/A/3 Mandal Paralane Kolkata 90</p>
                <p><i class="fa-solid fa-envelope"></i> example@gmail.com</p>
                <p><i class="fa-solid fa-phone"></i> +91 6788664557</p>
            </div>
            <div class="col-4 col-md-2">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-4 col-md-2">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-4 col-md-2">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-info" type="button">Subscribe</button>
                    </div>
                </form>
                <div class="social-icon">
                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-square-pinterest"></i></a>
                    <a href="#"><i class="fa-brands fa-square-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="copy">
            <p>CopyRight &copy; 2022 <strong><a href="#">ImgShop</a></strong>| Design By <a target="_blank" href="https://textifly.co/"><Strong>Textifly</Strong></a></p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>