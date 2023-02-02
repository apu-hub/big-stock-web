<?php include(__DIR__ . "/include/header.php") ?>
<?php
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

$downloadHistoryList = $obj->getList('download_history', "WHERE user_id = '" . $user_id . "'");

?>
<main>
    <section class="accsectionarea">
        <ul class="nav nav-tabs  d-lg-flex" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active tbbtn" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-solid fa-user-pen"></i>Edit Profile</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link tbbtn" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="fa-solid fa-user"></i>Profile Details</button>
            </li> -->
            <li class="nav-item" role="presentation">
                <button class="nav-link tbbtn" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i class="fa-solid fa-download"></i>Dawnload History</button>
            </li>
        </ul>
        <div class="tab-content accordion" id="myTabContent">
            <div class="tab-pane fade show active accordion-item" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa-solid fa-user-pen"></i>Edit Profile</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                        <div class="container editprofilearea">
                            <form action="" method="get"></form>
                            <form action="profile-update.php" method="POST" enctype="multipart/form-data">
                                <h4 style="text-align:center;">Profile Picture</h4>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('./images/profile/<?= $user['profile_picture'] ?? 'png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png' ?>');">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="first_name" value="<?= $user['first_name'] ?? "" ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="last_name" value="<?= $user['last_name'] ?? "" ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $user['email'] ?? "" ?>">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputNumber" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="exampleInputNumber" aria-describedby="emailHelp" name="mobile" value="<?= $user['mobile'] ?? "" ?>">

                                </div>
                                <!-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="">
                                </div> -->

                                <button type="submit" class="btn signupbtn" >Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="tab-pane fade accordion-item" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa-solid fa-user"></i>Profile Details
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse d-lg-block show" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                    <div class="accordion-body">
                        <div class="container editprofilearea">
                            <form>
                                <h4 style="text-align:center;">Profile Image Upload
                                </h4>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg');">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="email" class="form-control" id="exampleInputName" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputNumber" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="exampleInputNumber" aria-describedby="emailHelp">

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn signupbtn">Edit Profile</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div> -->
            <div class="tab-pane fade accordion-item" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <h2 class="accordion-header d-lg-none" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-download"></i>Dawnload History
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse d-lg-block show " aria-labelledby="headingThree" data-bs-parent="#myTabContent">
                    <div class="accordion-body hstrybdy">
                        <?php foreach ($downloadHistoryList as $downloadHistory) { ?>
                            <div class="container dwnldhistoryarea">
                                <div class="dawnloadbox">
                                    <div class="dwnimg">
                                        <a href="download.php?id=<?= $downloadHistory['image_hash_id'] ?>">
                                            <img src="admin/upload/<?= $downloadHistory['image_hash_id'] ?>" alt="" width="90px" height="100px">
                                        </a>
                                    </div>
                                    <div class="dwnhstry">
                                        <div class="imgnm">
                                            <?= $downloadHistory['image_hash_id'] ?>
                                            <!-- <a href="#">Lorem ipsum dolor sit amet.</a> -->
                                        </div>
                                        <div class="imgprcdwnldt">
                                            <p><i class="fa-solid fa-calendar-days"></i> <span><?= date_format(date_create($downloadHistory['date']), "Y/m/d") ?></span></p>
                                            <p><i class="fa-solid fa-indian-rupee-sign"></i> <span><?= $downloadHistory['image_price'] ?></span></p>
                                        </div>
                                        <a href="checkout.php?id=<?= $downloadHistory['image_hash_id'] ?>" target="_blank">
                                            <span class="btn signupbtn lgndnwldbtn">Re-Download</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="container dwnldhistoryarea">
                            <div class="dawnloadbox">
                                <div class="dwnimg">
                                    <a href="#">
                                        <img src="images/food.jpg" alt="" width="90px" height="100px">
                                    </a>
                                </div>
                                <div class="dwnhstry">
                                    <div class="imgnm">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </div>
                                    <div class="imgprcdwnldt">
                                        <p><i class="fa-solid fa-calendar-days"></i> <span>20/09/2023</span></p>
                                        <p><i class="fa-solid fa-indian-rupee-sign"></i> <span>380</span></p>
                                    </div>
                                    <button type="submit" class="btn signupbtn">Re-Dawnload</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>

<?php include("include/footer.php") ?>