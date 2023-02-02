<?php include("include/header.php") ?>
<main>



  <section class="container forgetpassarea">
    <form action="./forget-password-action.php" method="post">
      <!--<img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Enter Your Email Address</h1>

      <div class="form-floating frgtpswd">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required >
        <label for="floatingInput">Email address</label>
      </div>
      <!--<div class="form-floating">-->
      <!--  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">-->
      <!--  <label for="floatingPassword">Password</label>-->
      <!--</div>-->

      <button class=" btn signupbtn" type="submit">Submit</button>

    </form>
  </section>



</main>
<?php include("include/footer.php") ?>