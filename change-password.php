<?php include("include/header.php") ?>
<?php
$id = Utils::cleaner($_GET['id'] ?? "");
$token = Utils::cleaner($_GET['token'] ?? "");
?>

<!--<center>-->
<!--    <br><br><br>-->
<!--    <form action="./change-password-action.php" method="post">-->
<!--        <input type="text" name="id" value="<?= $id ?>" hidden>-->
<!--        <input type="text" name="token" value="<?= $token ?>" hidden>-->
<!--        New Password Here-->
<!--        <br>-->
<!--        <input type="text" name="password">-->
<!--        <br>-->
<!--        <br>-->
<!--        <button type="submit">change</button>-->
<!--    </form>-->
<!--</center>-->

<main>
  <section>

    <section class="container chngpassarea">
      <form action="./change-password-action.php" method="post">
        <input type="text" name="id" value="<?= $id ?>" hidden>
        <input type="text" name="token" value="<?= $token ?>" hidden>
        <!--<img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h1 class="h3 mb-3 fw-normal">Enter Your New Password</h1>


        <div class="form-floating cngpswd">
          <input type="password" class="form-control" id="reset_password" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
          <span>
            <p class="shwbtn" type="checkbox" onclick="myFunction()"><i class="fa-sharp fa-solid fa-eye showicon" id="myId"></i></p>
          </span>

        </div>

        <button class=" btn signupbtn" type="submit">Submit</button>

      </form>
    </section>
  </section>




</main>

<script>
  function myFunction() {

    var x = document.getElementById("reset_password");
    if (x.type === "password") {
      x.type = "text";
      document.getElementById("myId").style.color = "gray";
    } else {
      x.type = "password";
      document.getElementById("myId").style.color = "unset";
    }

  }
</script>
<?php include("include/footer.php") ?>