<?php
session_start();
$user_id = 0;
if (isset($_SESSION['admin_id'])) {
  $user_id = $_SESSION['admin_id'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thebigstock | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>LOGIN</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="login_action.php" method="post" id="loginform">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" id="email">


          </div>
          <span id="email_error" style="display:none;color:red">Please enter your email</span>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          </div>
          <span id="password_error" style="display:none;color:red">Please enter your password</span>


          <!-- /.col -->
          <div class="col-4">
            <!--  <button type="submit" class="btn btn-primary btn-block">Sign In</button>-->
            <input type="button" value="Sign In" class="btn btn-primary btn-block" onclick="validate()">
          </div>

      </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function validate() {
      var email = $("#email").val();
      var emailregex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var password = $("#password").val();
      if (email == '') {
        $('#email').focus();
        $('#email_error').show();
        $('#email_error').fadeOut(5000);

      } else if (emailregex.test(email) == false) {
        $('#email').focus();
        $('#email_error').html('Please enter valid email');
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

  <?php
  if ($user_id) {
    echo '<script type="text/javascript"> location.href="dashboard.php"; </script>';
  }
  ?>


</body>

</html>