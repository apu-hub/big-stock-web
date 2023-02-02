<?php include("include/header.php") ?>
<?php

$hashID = Utils::cleaner($_GET['id'] ?? "0");

// check login or not
if (!$user_id) {
  Utils::htmlRedirect('login.php');
}

// fetch user information
$user = $obj->getSingle('user_tbl', "WHERE id = '" . $user_id . "'");

// redirect to login page
if (!$user) {
  Utils::htmlRedirect("login.php?redirect=checkout.php?id=" . $hashID);
}

// fetch image information
$where = "WHERE hash_id = '$hashID'";
$image = $obj->getSingle('image_tbl', $where);

// redirect to home page
if (!$image) {
  Utils::htmlRedirect('index.php', 'Image Not Found');
}

// if already purchased
// fetch download history
$where = "WHERE image_hash_id = '$hashID' AND user_id = " . $user_id;
$downloadHistory = $obj->getSingle('download_history', $where);


// // ============= trigger download ============= \\
if ($downloadHistory) {
?>
  <center>
    <br><br><br>
    <h1>Thank You For Choosing Us</h1>
    <h6>Downloading Will Start Soon...</h6>
  </center>
<?php
  // clean previous session
  $_SESSION['hash_id'] = "";
  $_SESSION['hash_id'] = $hashID;
  Utils::htmlRedirectWithClose('admin/download_file.php?redirect=/bigstock');
}

// for now skip payment
Utils::htmlRedirect('checkout_action.php?id=' . $hashID, 'Thank You For Choosing Us');

?>
<main>
  <div class="container-xl" style="margin-top: 90px; margin-bottom: 50px;">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart Item</span>
          <span class="badge signupbtn rounded-pill"><span>1</span></span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo ucwords($image['image_name']) ?></h6>
              <small class="text-muted"><?php echo $image['image_description'] ?></small>
            </div>
            <span class="text-muted"><i class="fa-solid fa-indian-rupee-sign"></i><span> <?php echo $image['image_price'] ?></span></span>
          </li>
          <!--<li class="list-group-item d-flex justify-content-between lh-sm">-->
          <!--  <div>-->
          <!--    <h6 class="my-0">Second product</h6>-->
          <!--    <small class="text-muted">Brief description</small>-->
          <!--  </div>-->
          <!--  <span class="text-muted"><i class="fa-solid fa-indian-rupee-sign"></i><span> 6</span></span>-->
          <!--</li>-->
          <!--<li class="list-group-item d-flex justify-content-between lh-sm">-->
          <!--  <div>-->
          <!--    <h6 class="my-0">Third item</h6>-->
          <!--    <small class="text-muted">Brief description</small>-->
          <!--  </div>-->
          <!--  <span class="text-muted"><i class="fa-solid fa-indian-rupee-sign"></i><span> 25</span></span>-->
          <!--</li>-->
          <!--<li class="list-group-item d-flex justify-content-between bg-light">-->
          <!--  <div class="text-success">-->
          <!--    <h6 class="my-0">Promo code</h6>-->
          <!--    <small>EXAMPLECODE</small>-->
          <!--  </div>-->
          <!--  <span class="text-success">−<span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span></span>-->
          <!--</li>-->
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (Rs)</span>
            <strong><i class="fa-solid fa-indian-rupee-sign"></i><span><?php echo $image['image_price'] ?></span></strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn signupbtn">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="" method="post" action="checkout_action.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name'] ?>" readonly>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php echo $user['last_name'] ?>" readonly>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="number" class="form-label">Mobile Number <span class="text-muted"></span></label>
              <input type="number" readonly class="form-control" id="mobile" name="mobile" value="<?php echo $user['mobile'] ?>" placeholder="+91 **********">

            </div>
            <!-- <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text">@</span>
                      <input type="text" class="form-control" id="username" placeholder="Username" required="">
                    <div class="invalid-feedback">
                        Your username is required.
                      </div>
                    </div>
                  </div> -->

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="you@example.com" readonly>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <!--  <div class="col-12">-->
            <!--    <label for="address" class="form-label">Address</label>-->
            <!--    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">-->
            <!--    <div class="invalid-feedback">-->
            <!--      Please enter your shipping address.-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-12">-->
            <!--    <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>-->
            <!--    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">-->
            <!--  </div>-->

            <!--  <div class="col-md-5">-->
            <!--    <label for="country" class="form-label">Country</label>-->
            <!--    <select class="form-select" id="country" required="">-->
            <!--      <option value="">Choose...</option>-->
            <!--      <option>India</option>-->
            <!--    </select>-->
            <!--    <div class="invalid-feedback">-->
            <!--      Please select a valid country.-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-md-4">-->
            <!--    <label for="state" class="form-label">State</label>-->
            <!--    <select class="form-select" id="state" required="">-->
            <!--      <option value="">Choose...</option>-->
            <!--      <option>West bengal</option>-->
            <!--    </select>-->
            <!--    <div class="invalid-feedback">-->
            <!--      Please provide a valid state.-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-md-3">-->
            <!--    <label for="zip" class="form-label">Zip</label>-->
            <!--    <input type="text" class="form-control" id="zip" placeholder="" required="">-->
            <!--    <div class="invalid-feedback">-->
            <!--      Zip code required.-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->

            <!--<hr class="my-4">-->

            <!--<div class="form-check">-->
            <!--  <input type="checkbox" class="form-check-input" id="same-address">-->
            <!--  <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>-->
            <!--</div>-->

            <!--<div class="form-check">-->
            <!--  <input type="checkbox" class="form-check-input" id="save-info">-->
            <!--  <label class="form-check-label" for="save-info">Save this information for next time</label>-->
            <!--</div>-->

            <!--<hr class="my-4">-->

            <!--<h4 class="mb-3">Payment</h4>-->

            <!--<div class="my-3">-->
            <!--  <div class="form-check">-->
            <!--    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">-->
            <!--    <label class="form-check-label" for="credit">Credit card</label>-->
            <!--  </div>-->
            <!--  <div class="form-check">-->
            <!--    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">-->
            <!--    <label class="form-check-label" for="debit">Debit card</label>-->
            <!--  </div>-->
            <!--  <div class="form-check">-->
            <!--    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">-->
            <!--    <label class="form-check-label" for="paypal">PayPal</label>-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="row gy-3">-->
            <!--  <div class="col-md-6">-->
            <!--    <label for="cc-name" class="form-label">Name on card</label>-->
            <!--    <input type="text" class="form-control" id="cc-name" placeholder="" required="">-->
            <!--    <small class="text-muted">Full name as displayed on card</small>-->
            <!--    <div class="invalid-feedback">-->
            <!--      Name on card is required-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-md-6">-->
            <!--    <label for="cc-number" class="form-label">Credit card number</label>-->
            <!--    <input type="text" class="form-control" id="cc-number" placeholder="" required="">-->
            <!--    <div class="invalid-feedback">-->
            <!--      Credit card number is required-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-md-3">-->
            <!--    <label for="cc-expiration" class="form-label">Expiration</label>-->
            <!--    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">-->
            <!--    <div class="invalid-feedback">-->
            <!--      Expiration date required-->
            <!--    </div>-->
            <!--  </div>-->

            <!--  <div class="col-md-3">-->
            <!--    <label for="cc-cvv" class="form-label">CVV</label>-->
            <!--    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">-->
            <!--    <div class="invalid-feedback">-->
            <!--      Security code required-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->

            <!--<hr class="my-4">-->

            <button class="btn signupbtn" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include("include/footer.php") ?>
<!--<script src="https://js.instamojo.com/v1/checkout.js"></script>-->
<!--<script>-->
<!--function checkout(){-->
<!--    Instamojo.open("https://www.instamojo.com/@multizones");-->
<!--}-->

<!--</script>-->