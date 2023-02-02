<?php include("include/header.php") ?>
<?php
// ini_set('display_errors', 1);
include('config.php');
$login_button = '';
echo "================  A  ====================";
if (isset($_GET["code"])) {
echo "================  B  ====================";

    //     $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    //     if(!isset($token['error'])){
    //         $google_client->setAccessToken($token['access_token']);
    //          $_SESSION['access_token'] = $token['access_token'];
    //          $google_service = new Google_Service_Oauth2($google_client);
    //          $data = $google_service->userinfo->get();
    //           if(!empty($data['given_name'])){
    //   $_SESSION['first_name'] = $data['first_name'];
    //   }
    //   if(!empty($data['family_name'])){
    //   $_SESSION['last_name'] = $data['last_name'];
    //   }
    //   if(!empty($data['email'])){
    //   $_SESSION['email'] = $data['email'];
    //   }
    //   if(!empty($data['gender'])){
    //   $_SESSION['user_gender'] = $data['gender'];
    //   }

    //   if(!empty($data['picture'])){
    //   $_SESSION['user_image'] = $data['picture'];
    //   }

    //  }
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $google_client->setAccessToken($token['access_token']);

    // getting profile information
    $google_oauth = new Google_Service_Oauth2($google_client);
    $google_account_info = $google_oauth->userinfo->get();

    // showing profile info
    // echo "<pre>";
    // var_dump($google_account_info);
    $email = $google_account_info['email'];
    $where = "WHERE email='$email'";
    $user = $obj->getSingle('user_tbl', $where);
    if (!empty($user)) {
        $id = $user['id'];
        $_SESSION['id'] = $id;
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login Successfull.');
        window.location.href='index.php';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Email not found.Please register first');
        window.location.href='register.php';
        </script>");
    }
} else {
echo "================  C  ====================";

    $login_button = '<a href="' . $google_client->createAuthUrl() . '"></a>';
}
echo "================  D  ====================";

?>

<main>
    <section class="container-fluid loginarea">
        <div class="row flex align-items-center loginsection">
            <div class="col-md-4">
                <div class="left-part">
                    <h5>Industry standard graphic vectors, clipart & illustrations, created by professional graphic designers
                    </h5>
                    <p>Explore 1000s of ready to use vectors, illustrations & cliparts at ridiculously great prices</p>
                    <div class="imgriow">
                        <div class="row">
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="imgriow">
                        <div class="row">
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="imgriow">
                        <div class="row">
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matheus-farias-IevEctpkgcg-unsplash.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 ftrimggly">
                                <a href="#">
                                    <img src="images/matt-seymour-xARzDgBgoyM-unsplash.jpg" alt="">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="right-part">
                    <div class="glflml">
                        <div class="goglelgn">
                            <h5><a href="<?php echo $google_client->CreateAuthUrl(); ?>"><i class="fa-brands fa-google"></i>Login With Google</a></h5>
                        </div>
                        <div class="goglelgn">
                            <h5><a href="#"><i class="fa-brands fa-facebook"></i>Login With Facebook</a></h5>
                        </div>
                        <div class="goglelgn">
                            <h5><a href="#"><i class="fa-solid fa-envelope"></i>Login With Email</a></h5>
                        </div>
                    </div>
                    <div class="loginheading">
                        <h1>Login to your account</h1>
                        <p>Enter your details below</p>
                    </div>
                    <form action="login_action.php" method="post" enctype="multipart/form-data" id="loginform">
                        <input type="text" name="redirect" value="<?= Utils::cleaner($_GET['redirect'] ?? "") ?>" hidden>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" required="" name="email">
                        </div>
                        <span id="email_error" style="display:none;color: red;">Please enter your email</span>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="" name="password" required="">
                            <span id="password_error" style="display:none;color: red;">Please enter your password</span>
                            <a class="frgtpss" href="./forget-password.php">Forgotten Password</a>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="validate()">Submit</button>
                </div>
                </form>
                <div class="siglnk">

                    <p>Don't Have an Account <span><a href="register.php">SignUp</a></span></p>
                </div>
            </div>
        </div>
    </section>
</main>



<?php include("include/footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    function validate() {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email == '') {
            $('#email').focus();
            $('#email_error').show();
            $('#email_error').fadeOut(5000);
        } else if (password == '') {
            $('#password').focus();
            $('#password_error').show();
            $('#password_error').fadeOut(5000);
        } else {
            $('#loginform').submit();
        }
    }
</script>