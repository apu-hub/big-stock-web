<?php
session_start();
include(__DIR__ . '/../function.php');
$user_id = 0;
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
}


$obj = new Operations;

// fetch user information
$where = "WHERE role = " . '2';
$user = $obj->getSingle('user_tbl', $where);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ############################# -->
    <?php
    $hashID = $_GET['id'] ?? "0";
    if ($hashID) {
        $image = $obj->getSingle('image_tbl', "WHERE hash_id = '$hashID'");
        if ($image) {
    ?>
            <!--  Essential META Tags -->
            <meta property="og:title" content="<?= $image['image_name'] ?>">
            <meta property="og:type" content="<?= $image['image_description'] ?>" />
            <meta property="og:image" content="https://thebigstock.com/bigstock/admin/upload/<?= $image['image'] ?>">
            <meta property="og:url" content="https://thebigstock.com/bigstock/download.php?id=<?= $hashID ?>">
            <meta name="twitter:card" content="<?= $image['image_description'] ?>">
    <?php
        }
    }
    ?>
    <!-- ################################ -->

    <title>thebigstock</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://kit.fontawesome.com/64d5257106.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/isotope.js" type="text/javascript"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light fixed-top ">
            
            <div class="container-fluid desktopnavbar">

                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <strong>TheBigstock</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav m-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <?php

                        $result = $obj->getAll("category_tbl");
                        foreach ($result as $results) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="category.php?category_id=<?php echo $results['id'] ?>" data-bs-toggle="dropdown">

                                    <?php echo $results['category_name']; ?> </a>


                                <ul class="dropdown-menu fade-up">

                                    <?php
                                    $where = "WHERE category_id = " . $results['id'];
                                    $tags = $obj->getList('tags_tbl', $where);
                                    foreach ($tags as $tag) {

                                    ?>
                                        <li><a class="dropdown-item" href="category_list.php?category_id=<?php echo $tag['category_id'] ?>&tag_id=<?php echo $tag['id'] ?>"><?php echo $tag['tags']; ?> </a></li>
                                    <?php
                                    } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if (!$user) { ?>
                            <!-- <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="upload.php">Upload</a>
                                </li> -->
                        <?php } ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="contribute.php">Contribute</a>
                        </li> -->
                    </ul>
                    <?php if ($user_id) { ?>
                        <a href="user-account.php" class="btn loginbtn" type="submit">User Account</a>
                        <a href="logout.php" class="btn loginbtn" type="submit">Logout</a>
                    <?php } else { ?>
                        <form class="d-flex  fordesktonavlogin" role="search">
                            <!-- <button class="btn  signupbtn" type="submit">register</button> -->
                            <a href="login.php" class="btn loginbtn" type="submit">login</a>
                            <a href="register.php" class="btn signupbtn" type="submit">sign up</a>
                        </form>
                    <?php } ?>
                </div>
            </div>

            <div class="mobilenavbar">
                <a class="btn btnmobile" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <span>
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </a>
                <form class="formorbileonavlogin" role="search">
                    <?php if ($user_id) { ?>
                        <div class="mobilelgotbnt">
                            <button class="btn loginbtn"><a href="user-account.php" type="submit" style="text-decoration:none;">User Account</a></button>
                            <button class="btn loginbtn"><a href="logout.php" type="submit" style="text-decoration:none;">Logout</a></button>
                        </div>
                    <?php } else { ?>
                        <div class="mlgbtn">
                            <button class="btn loginbtn"><a href="login.php" style="text-decoration:none" ;>login</a></button>
                            <button class="btn signupbtn"> <a href="register.php" type="submit" style="text-decoration:none; color:white;">sign up</a></button>
                        </div>
                    <?php } ?>
                </form>
            </div>


            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><strong>TheBigStock</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav m-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 260px;">
                        <?php

                        $result = $obj->getAll("category_tbl");
                        foreach ($result as $results) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    <?php echo $results['category_name']; ?>
                                </a>

                                <ul class="dropdown-menu fade-up">

                                    <?php
                                    $where = "WHERE category_id = " . $results['id'];
                                    $tags = $obj->getList('tags_tbl', $where);
                                    foreach ($tags as $tag) {
                                    ?>
                                        <li><a class="dropdown-item" href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"> <?php echo $tag['tags']; ?> </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php
                        if (isset($user_id)) {
                            $where = "WHERE role = " . '2';
                            $user = $obj->getSingle('user_tbl', $where);
                            if (!empty($user)) {

                        ?>
                                <!-- <li class="nav-item">
                                        <a class="nav-link" href="upload.html">Upload</a>
                                    </li> -->
                        <?php
                            }
                        } else {
                        }
                        ?>
                        <!-- <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="contribute.php">Contribute</a>
                            </li> -->
                    </ul>
                    <div class="dropdown mt-3">
                        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="fa-solid fa-user"></i>Jon </span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="#">My Earnings</a></li>
                            <?php if (isset($user_id)) { ?>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </nav>
    </header>