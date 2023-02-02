<?php include("include/header.php") ?>
<?php
$result = $obj->getAll("category_tbl");
$banner_info_list = $obj->getAll("banner_info");
?>
<main class="indexmain">
    <section class="container-fluid herosection">
        <div class=" heroimg">
            <div id="carouselExampleAutoplaying" class="carousel slide">
                <div class="carousel-indicators">
                    <?php foreach ($banner_info_list as $i => $banner_info) { ?>
                        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>" <?= $i == 0 ? 'class="active" aria-current="true"' : '' ?>></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($banner_info_list as $i => $banner_info) { ?>
                        <div class="carousel-item <?= $i == 0 ? "active" : "" ?>">
                            <img src="./admin/upload/banner/<?= $banner_info['image_name'] ?>" class="d-block w-100" alt="<?= $banner_info['name'] ?>">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



            <!--    <div class="herotext">-->
            <!--        <h1>Enjoy the versatility of vector graphics photo</h1>-->
            <!--        <div class="container-xl searchbararae">-->
            <!-- <div class="cartagorybox"> -->
            <!-- <div class="dropdown "> -->
            <!--                        <button class="btn  dropdown-toggle ctgrydpdn" type="button"-->
            <!--                            data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--                            Select Catagory-->
            <!--                        </button>-->
            <!--                      <ul class="dropdown-menu " style="padding: 4px 10px">-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="radio" name="flexRadioDefault"-->
            <!--                                    id="flexRadioDefault1">-->
            <!--                                <label class="form-check-label" for="flexRadioDefault1">-->
            <!--                                    Default radio-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="radio" name="flexRadioDefault"-->
            <!--                                    id="flexRadioDefault2" checked>-->
            <!--                                <label class="form-check-label" for="flexRadioDefault2">-->
            <!--                                    Default-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <hr>-->

            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckDefault">-->
            <!--                                <label class="form-check-label" for="flexCheckDefault">-->
            <!--                                    Free-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckChecked">-->
            <!--                                <label class="form-check-label primium" for="flexCheckChecked">-->
            <!--                                    Premium-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <hr>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckDefault">-->
            <!--                                <label class="form-check-label" for="flexCheckDefault">-->
            <!--                                    Icons-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckChecked">-->
            <!--                                <label class="form-check-label" for="flexCheckChecked">-->
            <!--                                    Photo-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckChecked">-->
            <!--                                <label class="form-check-label" for="flexCheckChecked">-->
            <!--                                    PSD-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                            <div class="form-check">-->
            <!--                                <input class="form-check-input" type="checkbox" value=""-->
            <!--                                    id="flexCheckChecked">-->
            <!--                                <label class="form-check-label" for="flexCheckChecked">-->
            <!--                                    Vector-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->

            <form action=""></form>
            <form action="search.php" method="get">
                <div class="searchbarar">
                    <input class="searchinput" type="text" class="form-control" id="category_name" name="q" aria-describedby="text" placeholder="Search ">
                    <button class="btnsearch">Search</button>
                </div>
            </form>
            <!--        </div>-->
            <!--    </div>-->

        </div>
    </section>

    <section class="container-fluid catagryonearea">
        <div class="container-xxl slick-carousel">
            <!-- Inside the containing div, add one div for each slide -->
            <?php


            foreach ($result as $results) {
            ?>
                <div class="imgcata">
                    <a class="ctarabx" href="category.php?category_id=<?= $results['id'] ?>">
                        <img class="rectangleimg" src="admin/upload/<?= $results['image'] ?>" alt="<?= $results['category_name'] ?>">
                        <h5><?= $results['category_name'] ?></h5>
                    </a>
                </div>
            <?php }
            ?>
            <!-- <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>T-Shirt Design</h5>
                     </a>
                </div>
                <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>
                            Illustrations</h5>
                     </a>
                </div>
                <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Photography 
                            </h5>
                     </a>
                </div>
                <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Cup Design</h5>
                     </a>
                </div>
                <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Vector</h5>
                     </a>
                  </div>
                  <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Vector</h5>
                     </a>
                  </div>
                  <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Vector</h5>
                     </a>
                  </div>
                  <div class="imgcata">
                    <a href="#">
                        <img src="images/solid2.jpg" alt="">
                        <h5>Vector</h5>
                     </a>
                  </div>-->
        </div>
    </section>

    <section class="container-xxl fordesktopone">
        <h1 class="headingone">Browse by collections</h1>
        <div class="brawes-part-1">
            <div class="row">
                <?php
                $where = "WHERE feature_image = 'active'";
                $res = $obj->getList('category_tbl', $where);
                foreach ($res as $cat) {
                ?>
                    <div class="col-md-2 ">
                        <div class="pt1imgbx">
                            <a href="category_list.php?category_id=<?php echo $cat['id'] ?>">
                                <img src="admin/upload/<?php echo $cat['image'] ?>" alt="">
                                <h4><?php echo $cat['category_name'] ?></h4>
                            </a>
                        </div>
                    </div>
                <?php
                } ?>
                <!--  <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/mobile.jpg" alt="">
                                <h4>Mobile</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/viktor-bystrov-eHRzs3zunvQ-unsplash.jpg"
                                    alt="">
                                <h4>Home</h4>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/herobacj.jpg" alt="">
                                <h4>Helth</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/teodor-drobota-sgohWar0cfg-unsplash.jpg"
                                    alt="">
                                <h4>Summer</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/viktor-bystrov-eHRzs3zunvQ-unsplash.jpg"
                                    alt="">
                                <h4>Home</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-xxl  for-mobileone">
            <h1 class="headingone">Browse by collections</h1>
            <div class="brawes-part-1">
                <div class="row">
                    <div class="col-4 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/food.jpg" alt="">
                                <h4>food</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/mobile.jpg" alt="">
                                <h4>Mobile</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/viktor-bystrov-eHRzs3zunvQ-unsplash.jpg"
                                    alt="">
                                <h4>Home</h4>
                        </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/herobacj.jpg" alt="">
                                <h4>Helth</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/teodor-drobota-sgohWar0cfg-unsplash.jpg"
                                    alt="">
                                <h4>Summer</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/viktor-bystrov-eHRzs3zunvQ-unsplash.jpg"
                                    alt="">
                                <h4>Home</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>




        <section>
            <div class="container-xxl browespart2 fordesktopone">
                <div class="row flex">
                    <div class="col-md-4 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/sugarman-joe-8LwuNlcxNwQ-unsplash.jpg"
                                    alt="">
                                <h4>City</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/manki-kim-PDYxI7gzPwM-unsplash.jpg" alt="">
                                <h4>Cars</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                       <div class="pt1imgbx">
                        <a href="#">
                            <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" alt="">
                            <h4>space</h4>
                        </a>
                       </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="container-xxl browespart2 for-mobileone">
                <div class="row flex">
                    <div class="col-6 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/sugarman-joe-8LwuNlcxNwQ-unsplash.jpg"
                                    alt="">
                                <h4>City</h4>
                            </a>
                        </div>
                 
                    </div>
                    <div class="col-6 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/manki-kim-PDYxI7gzPwM-unsplash.jpg" alt="">
                                <h4>Cars</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" alt="">
                                <h4>space</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-xxl fordesktopone">
            <div class="brawes-part-1">
                <div class="row">
                    <div class="col-md-3">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/sugarman-joe-8LwuNlcxNwQ-unsplash.jpg"
                                    alt="">
                                <h4>Women</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="">
                                <h4>Nature & Travel</h4>
                            </a>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/life.jpg" alt="">
                                <h4>LifeStyle & Fashionn</h4>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/life.jpg" alt="">
                                <h4>LifeStyle & Fashionn</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-xxl browespart2">
                <div class="row flex">
                    <div class="col-md-2">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/gradient.jpg" alt="">
                                <h4>Gradient</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/img-product-2-removebg-preview.png" alt="">
                                <h4>Solid</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/carr.jpg" alt="">
                                <h4>Cartoon</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                       <div class="pt1imgbx">
                        <a href="#">
                            <img src="images/graphics.jpg" alt="">
                            <h4>Graphics</h4>
                        </a>
                       </div>
                    </div>
                    <div class="col-md-2 ">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/solid.jpg" alt="">
                                <h4>Women</h4>
                            </a>
                        </div>
                    </div>-->
            </div>
        </div>

        <div class="container bmorebtn">
            <a href="category.php">Browse More Collection</a>
        </div>
    </section>


    <section class="container-xxl for-mobileone">
        <div class="brawes-part-1">
            <div class="row">
                <?php
                $where = "WHERE feature_image = 'active'";
                $res = $obj->getList('category_tbl', $where);
                foreach ($res as $img) {
                ?>
                    <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="category.php">
                                <img src="admin/upload/<?php echo $img['image'] ?>" alt="">
                                <h4><?php echo $img['category_name']; ?></h4>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <!--  <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="">
                                <h4>Nature & Travel</h4>
                            </a>
                        </div>

                    </div>-->

                <!-- <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/life.jpg"
                                    alt="">
                                <h4>LifeStyle & Fashionn</h4>
                        </div>
                        </a>
                    </div> -->
                <!-- <div class="col-4">
                        <div class="pt1imgbx">
                            <a href="#">
                                <img src="images/life.jpg" alt="">
                                <h4>LifeStyle & Fashionn</h4>
                        </div>
                        </a>
                    </div>-->
                <!--   </div>
            </div>

            <div class="container-xxl browespart2">
                <div class="row flex">
                    <div class="col-4 pt1imgbx">
                        <a href="#">
                            <img src="images/gradient.jpg" alt="">
                            <h4>Gradient</h4>
                        </a>
                    </div>
                    <div class="col-4 pt1imgbx">
                        <a href="#">
                            <img src="images/img-product-2-removebg-preview.png" alt="">
                            <h4>Solid</h4>
                        </a>
                    </div>
                    <div class="col-4 pt1imgbx">
                        <a href="#">
                            <img src="images/carr.jpg" alt="">
                            <h4>Cartoon</h4>
                        </a>
                    </div>
                    <div class="col-6 pt1imgbx">
                        <a href="#">
                            <img src="images/graphics.jpg" alt="">
                            <h4>Graphics</h4>
                        </a>
                    </div>
                    <div class="col-6 pt1imgbx">
                        <a href="#">
                            <img src="images/solid.jpg" alt="">
                            <h4>Women</h4>
                        </a>
                    </div>
                    <div class="col-md-2 pt1imgbx">
                        <a href="#">
                            <img src="images/solid.jpg" alt="">
                            <h4>Women</h4>
                        </a>
                    </div>
                </div>
            </div>-->

                <div class="container bmorebtn">
                    <a href="#">Browse More Collection</a>
                </div>
    </section>

    <section>
        <div>
            <div class=" container-xxl ftrs">
                <div class="row flex">
                    <div class="col-md-4 gphb">
                        <i class="fa fa-photo"></i>
                        <h2>High Quality Graphics</h2>
                        <p>Created by the world's most talented design community. Fresh graphics added daily.</p>
                    </div>
                    <div class="col-md-4 gphb">
                        <i class="fa fa-address-card-o"></i>
                        <h2>Worry-free Licensing</h2>
                        <p>Fully guaranteed graphics that includes vectors, clipart and illustrations for personal
                            or
                            commercial use. Create with confidence.</p>
                    </div>
                    <div class="col-md-4 gphb">
                        <i class="fa fa-heart-o"></i>
                        <h2>High Demand</h2>
                        <p>Fully guaranteed graphics for personal or commercial use. Available in .cdr, .psd, .ai
                            and
                            .pdf formats. Create with confidence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="container-xxl sellingarea">
        <div class="startsellingpht">
            <div class="slngtxt">
                <h3>Still looking for the right image?
                    Sell your own images and earn money.</h3>
                <p>Use the marketplace to showcase your work and make extra income!</p>
            </div>
            <div class="slngbtn">
                <a href="#">Start Selling Photo</a>
            </div>
        </div>
    </section>


    <section class="container-xxl  imagegalleryarea">
        <div class="container-xxl imgglyhdng">
            <h1>Latest from lifestyle</h1>
            <h5>Hight-resolution free and premium images & videos</h5>
        </div>

        <div class="gllery-content">
            <div class="gallerycard">
                <?php
                $where = "ORDER BY id DESC LIMIT 0,4";
                $image = $obj->getList('image_tbl', $where);
                foreach ($image as $img) {
                ?>
                    <div class="card">
                        <div class="card-image">
                            <a href="download.php?id=<?= $img['hash_id'] ?>">
                                <img src="admin/upload/<?= $img['image'] ?>" alt="Image Gallery" data-caption="">
                            </a>
                        </div>

                        <div class="dnldonr">
                            <div class="imgonr">
                                <a href="download.php?id=<?= $img['hash_id'] ?>">
                                    <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px" height="30px" alt="">
                                    <?= $img['image_name']; ?>
                                </a>
                            </div>
                            <div class="dnldicon">
                                <a href="checkout.php?id=<?= $img['hash_id']; ?>"><i class="fa-solid fa-arrow-down"></i></a>
                            </div>

                        </div>
                    </div>
                <?php
                } ?>
                <!-- <div class="card">
                   <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/carr.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->

                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/graphics.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/food.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/gradient.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/manki-kim-PDYxI7gzPwM-unsplash.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"-->
                <!--                 alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->

                <!--     </div>-->
                <!-- </div>-->
                <!-- <div class="card">-->
                <!--     <div class="card-image">-->
                <!--         <a href="" data-fancybox="gallery" data-caption="Caption Images 1">-->
                <!--             <img src="images/graphics.jpg" alt="Image Gallery">-->
                <!--         </a>-->
                <!--     </div>-->
                <!--     <div class="dnldonr">-->
                <!--         <div class="imgonr">-->
                <!--             <a href="#">-->
                <!--                 <img src="images/sebastian-svenson-d2w-_1LJioQ-unsplash.jpg" width="30px"-->
                <!--                     height="30px" alt="">-->
                <!--                 Matlib-->
                <!--             </a>-->
                <!--         </div>-->
                <!--         <div class="dnldicon">-->
                <!--             <a href="#"><i class="fa-solid fa-arrow-down"></i></a>-->
                <!--         </div>-->-->

            </div>
        </div>
        </div>
        </div>
        <div class="container bmorebtn">
            <a href="search.php">Explore More Stock</a>
        </div>
    </section>

    <section class="container-xxl">
        <div class="heding">
            <h1>Latest from the team</h1>
        </div>

        <div class="row flex blogpostarea">
            <?php
            //$where ="WHERE category_id = ".$results['id'];
            $where = "WHERE added_by =" . '1';
            $where = "ORDER BY id DESC LIMIT 0,4";
            $image = $obj->getList('image_tbl', $where);
            foreach ($image as $tag) {
            ?>
                <div class="col-md-3">
                    <div class="blogpst">
                        <div class="pstimg">
                            <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>">
                                <img src="admin/upload/<?php echo $tag['image'] ?>" alt="">
                            </a>
                        </div>
                        <div class="pstbdy">
                            <!-- <div class="adminnddte">
                                <a href="#"><i class="fa-solid fa-user"></i> Admin</a>
                                <p><i class="fa-solid fa-calendar-days"></i> 26 Mar 2022</p>
                            </div>-->
                            <div class="pstttle">
                                <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"><?php echo $tag['image_name']; ?></a>
                            </div>
                            <a href="">Continue Reading &rightarrow;</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="col-md-4">
                    <div class="blogpst">
                        <div class="pstimg">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/fly-d-art-photographer-sBvPWEwgYMk-unsplash-800x528.jpg"
                                    alt="">
                            </a>
                        </div>
                        <div class="pstbdy">
                            <div class="adminnddte">
                                <a href="#"> <i class="fa-solid fa-user"></i> Admin</a>
                                <p><i class="fa-solid fa-calendar-days"></i> 26 Mar 2022</p>
                            </div>
                            <div class="pstttle">
                                <a href="#">Nullam vel pellentesque massa, porttitor tempor risus</a>
                            </div>
                            <a href="#">Continue Reading &rightarrow;</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blogpst">
                        <div class="pstimg">
                            <a href="#">
                                <img src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/spencer-davis-iwFp5FvAUYE-unsplash-800x528.jpg"
                                    alt="">
                            </a>
                        </div>
                        <div class="pstbdy">
                            <div class="adminnddte">
                                <a href="#"><i class="fa-solid fa-user"></i> Admin</a>
                                <p> <i class="fa-solid fa-calendar-days"></i> 26 Mar 2022</p>
                            </div>
                            <div class="pstttle">
                                <a href="#">Nullam vel pellentesque massa, porttitor tempor risus</a>
                            </div>
                            <a href="#">Continue Reading &rightarrow;</a>
                        </div>
                    </div>
                </div>-->
        </div>
        <div class="container bmorebtn">
            <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>">More Blog</a>
        </div>
    </section>



    <section class="container-xxl mrecollectionarea">
        <div class="heding">
            <h1>More Collection</h1>
        </div>
        <div class="row flex morecontent">
            <?php
            //$where ="WHERE category_id = ".$results['id'];
            // $where="WHERE tag_id =".$tag['id'];
            $where = "ORDER BY RAND() DESC LIMIT 0,3";
            $image = $obj->getList('image_tbl', $where);
            foreach ($image as $tag) {


            ?>
                <div class="col-md-4">
                    <div class="morecollbx">
                        <div class="mrcollbximg">
                            <div class="img1">
                                <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"><img src="admin/upload/<?php echo $tag['image'] ?>" alt=""></a>
                            </div>
                            <div class="img2">
                                <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"><img src="admin/upload/<?php echo $tag['image'] ?>" alt=""></a>
                                <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"> <img src="admin/upload/<?php echo $tag['image'] ?>" alt=""></a>
                            </div>
                        </div>
                        <a href="category_list.php?category_id=<?php echo $tag['category_id'] ?>"><?php echo $tag['image_name']; ?></a>
                        <div class="btngroup">
                            <div class="btn-group botomgrp" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Right</button>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--   <div class="col-md-4">
                    <div class="morecollbx">
                        <div class="mrcollbximg">
                            <div class="img1">
                                <a href="#"><img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/spencer-davis-iwFp5FvAUYE-unsplash-800x528.jpg"
                                        alt=""></a>
                            </div>
                            <div class="img2">
                                <a href="#"><img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/spencer-davis-iwFp5FvAUYE-unsplash-800x528.jpg"
                                        alt=""></a>
                                <a href="#"> <img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/spencer-davis-iwFp5FvAUYE-unsplash-800x528.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <a href="#">Nature & Travel</a>
                        <div class="btngroup">
                            <div class="btn-group botomgrp" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Right</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="morecollbx">
                        <div class="mrcollbximg">
                            <div class="img1">
                                <a href="#"><img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/fly-d-art-photographer-sBvPWEwgYMk-unsplash-800x528.jpg"
                                        alt=""></a>
                            </div>
                            <div class="img2">
                                <a href="#"><img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/fly-d-art-photographer-sBvPWEwgYMk-unsplash-800x528.jpg"
                                        alt=""></a>
                                <a href="#"> <img
                                        src="https://utillz.com/themes/heilz/wp-content/uploads/2021/08/fly-d-art-photographer-sBvPWEwgYMk-unsplash-800x528.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <a href="#">Home & Life</a>
                        <div class="btngroup">
                            <div class="btn-group botomgrp" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Left</button>
                                <button type="button" class="btn btn-dark">Middle</button>
                                <button type="button" class="btn btn-dark">Right</button>
                            </div>
                        </div>
                    </div>
                </div>-->
        </div>

    </section>
</main>

<?php include("include/footer.php") ?>

<script>
    // Fancybox Configuration
    // $jq('[data-fancybox="gallery"]').fancybox({
    //     buttons: [
    //       "slideShow",
    //       "thumbs",
    //       "zoom",
    //       "fullScreen",
    //       "download",
    //       "share",
    //       "close"
    //     ],
    //     loop: false,
    //     protect: true
    //   });
</script>