<?php include("include/header.php") ?>
<?php
$hashID = Utils::cleaner($_GET['id'] ?? "0");

if ($hashID == "") {
    Utils::htmlRedirect("index.php");
}

$image = $obj->getSingle('image_tbl', "WHERE hash_id = '$hashID'");

// redirect to home page
if (!$image) {
    Utils::htmlRedirect('index.php', 'Image Not Found');
}

$userInfo = $obj->getSingle("user_tbl", "WHERE id = '" . $image['added_by'] . "'");

// other information
$categoryID = $image['category_id'];

// fetch tag
$where = "WHERE id = " . $categoryID;
$category = $obj->getSingle('category_tbl', $where);
$categoryName = $category['category_name'] ?? "";

// fetch images
// SELECT * FROM `image_tbl` ORDER BY `image_tbl`.`id` DESC
$where = "WHERE category_id = '" . $categoryID . "' limit 2";
$imageList = $obj->getList('image_tbl', $where);

// fetch tag
$where = "WHERE category_id = " . $categoryID;
$tagList = $obj->getList('tags_tbl', $where);

$post_url = "https://thebigstock.com/bigstock/download.php?id=" . $hashID;

?>
<main>
    <section class="container-xxl dnwldarea">
        <div class="row flex  dawnldcontnt">
            <!-- Image Section -->
            <div class="col-md-7">
                <div class="dnldimg">
                    <a href="#">
                        <img src="admin/upload/<?= $image['image'] ?>" alt="">
                    </a>
                </div>
                <!-- Author Information  -->
                <div class="imdatshrb">
                    <div class="detail__author">
                        <a class="popover--author search__link" href="" data-filter="author=10171402&amp;authorSlug=pch-vector&amp;format=author&amp;page=1">
                            <span class="avatar">
                                <img src="images/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-removebg-preview.png" alt="" onerror="this.src = ''">
                            </span>
                            <div class="autordesin">
                                <div class="font-basedec">
                                    <span class="author__name semibold"><?= $userInfo['first_name'] ?> <?= $userInfo['last_name'] ?></span>
                                    <span class="block font-xs text__scale-gray--6 regular author-count">26k
                                        assets</span>
                                </div>
                                <!-- <button class="follow follow--sm noscript" data-active="Following" data-active-hover="Unfollow" data-author-id="10171402" data-author-name="pch.vector" data-base="Follow">Follow</button> -->
                            </div>
                        </a>
                    </div>

                    <div class="lkshrbtn">
                        <!-- <a class="shre"><i class="fa-solid fa-square-plus"></i> Collect</a> -->
                        <!-- <a class="shre"><i class="fa-solid fa-heart"></i> Like</a> -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle shre" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span><i class="fa-solid fa-share"></i></span> Share
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://www.facebook.com/sharer.php?u=<?= $post_url ?>"><i class="fa-brands fa-square-facebook"></i> Facebook</a></li>
                                <li><a class="dropdown-item" href="https://www.instagram.com/?url=<?= $post_url ?>"><i class="fa-brands fa-square-instagram"></i> Instragram</a></li>
                                <li><a class="dropdown-item" href="https://twitter.com/share?url=<?= $post_url ?>&text=<?= $image['image_name'] ?>&via=&hashtags="><i class="fa-brands fa-square-twitter"></i> Twitter</a>
                                </li>
                                <li><a class="dropdown-item" href="https://pinterest.com/pin/create/bookmarklet/?url=<?= $post_url ?>&media=<?= $image['image'] ?>&is_video=false&description=<?= $image['image_description'] ?>"><i class="fa-brands fa-square-pinterest"></i> Pinterest</a></li>
                                <li><a class="dropdown-item" href="https://www.linkedin.com/shareArticle?url=<?= $post_url ?>&title=<?= $image['image_name'] ?>"><i class="fa-brands fa-linkedin"></i> Linkedin</a></li>
                                <li onclick="copy_to_clipboard('<?= $post_url ?>')"> <i class="fas fa-clipboard"></i> Copy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Image Information -->
            <div class="col-md-5">
                <div class="imgdnldtxt">
                    <h3><?= $image['image_description'] ?></h3>

                    <P>Design Code: <?= $image['hash_id'] ?></P>


                    <div class="imddecp">
                        <span>
                            <p>
                                <i class="fa-sharp fa-solid fa-file"></i> File type:
                            </p>
                            <p>
                                <?php
                                // get file type
                                $temp = explode('.', $image['file']);
                                $ext = end($temp);
                                echo  $ext ?? "NA";
                                ?>
                            </p>
                        </span>
                        <span>
                            <p>
                                <i class="fa-solid fa-camera-retro"></i>Resolution:
                            </p>
                            <p>
                                <?php
                                if ($image['width'] == "" || $image['height'] == "") {
                                    echo "NA";
                                } else {
                                    echo $image['width'], " X ", $image['height'];
                                }
                                ?>
                            </p>
                        </span>
                        <span>
                            <p><i class="fa-sharp fa-solid fa-calendar"></i>Uploaded:</p>
                            <p><?= date_format(date_create($image['date']), "Y/m/d") ?></p>
                        </span>
                        <span>
                            <p><i class="fa-solid fa-indian-rupee-sign"></i>Price :</p>
                            <p><?= $image['image_price'] ?></p>
                        </span>
                        <span>
                            <p><i class="fa-solid fa-eye"></i>Views:</p>
                            <p>
                                <?php
                                $viewCount = $image['view_count'];

                                if ($viewCount > 1000)
                                    echo ceil($viewCount / 1000), "K";
                                else
                                    echo $viewCount;
                                ?>
                            </p>
                        </span>

                        <span>
                            <p><i class="fa-sharp fa-solid fa-download"></i>Downloads:</p>
                            <p>
                                <?php
                                $downloadCount = $image['download_count'];

                                if ($downloadCount > 1000)
                                    echo ceil($downloadCount / 1000), "K";
                                else
                                    echo $downloadCount;
                                ?>
                            </p>
                        </span>
                        <hr>
                    </div>
                    <?php if ($user_id) { ?>
                        <div class="lgntdwnld">
                            <a href="checkout.php?id=<?= $hashID ?>" target="_blank">
                                <span class="lgndnwldbtn">Download Now</span>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="lgntdwnld">
                            <a href="login.php?redirect=download.php?id=<?= $hashID ?>" rel="noopener noreferrer">
                                <button class="lgndnwldbtn">Login To Dawnload</button>
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>



    <section class="container-xxl taglistarea">
        <p>
            <?php foreach ($tagList as $tag) { ?>
                <a href="category_list.php?category_id=<?= $categoryID ?>&tag_id=<?= $tag['id'] ?>" class="tags"><?= $tag['tags'] ?></a>
            <?php } ?>
        </p>
    </section>

    <section class="imggllerybox">

        <div class="twoportfolio">
            <h2 class="title">Related Image</h2>
            <?php foreach ($imageList as $img) { ?>
                <a href="download.php?id=<?= $img['hash_id'] ?>" class="card">
                    <div class="content">
                        <span class="title"><?= $img['image_name'] ?></span>
                        <span class="category"><?= $categoryName ?></span>
                        <span class="ignmnm">
                            <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                            <p><?= $userInfo['first_name'] ?> <?= $userInfo['last_name'] ?></p>
                        </span>


                    </div>
                    <div class="image">
                        <img src="admin/upload/<?= $img['image'] ?>" alt="" />
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>

</main>

<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>

<?php if ($user_id) { ?>
    <script>
        $(document).ready(function() {
            storeHashID()
        });

        function storeHashID() {
            var hashID = "<?= $hashID ?>";

            if (hashID == "") return

            var hashIDList = [];

            hashIDList = JSON.parse(localStorage.getItem('hash_id_list')) ?? []

            console.log(hashIDList); // Only Dev

            // search hash id
            var isMatch = false;
            for (let index = 0; index < hashIDList.length; index++) {
                if (hashIDList[index] == hashID) {
                    isMatch = true
                    break
                }
            }


            // match then return
            if (isMatch) return

            // store hash id
            hashIDList.push(hashID)
            localStorage.setItem('hash_id_list', JSON.stringify(hashIDList))

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: 'api.php?function=image_view_counter',
                method: 'POST',
                data: {
                    hash_id: hashID
                },
                success: function(res) {
                    console.log(res); // Only Dev
                }
            })
        }
    </script>
<?php } ?>
<script>
    function copy_to_clipboard(copy_string) {
        // Copy the text inside the text field
        navigator.clipboard.writeText(copy_string);

        // Alert the copied text
        // alert("Link Copied");
    }
</script>

<?php include("include/footer.php") ?>