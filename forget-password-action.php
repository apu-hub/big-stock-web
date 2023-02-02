<?php
include "function.php";
require_once("./action/mailer.php");

$email = Utils::cleaner($_POST['email']??"");

$Controller = new Operations;

$table = "user_tbl";

$where = "WHERE email = '" . $email . "'";
$result = $Controller->getSingle($table, $where);

// if account not found
if (!$result) {
    echo "<script>
alert('No Account Found SignUp Please');
window.location.href='forget-password.php';
</script>";
    exit();
}


// generate token 
$token = md5(microtime(true));
$first_name = $result['first_name'];
$user_id = $result['id'];

$forget_password_table = "forget_password";
$data = array(
    "email" => $email,
    'user_id' => $user_id,
    "token" => $token,
);
// add token to Database
try {
    $id = $Controller->insert($forget_password_table, $data);
} catch (Exception $e) {
    echo "<script>
alert('something went wrong please try again');
window.location.href='forget-password.php';
</script>";
}


// TODO MAILER
$subject = "Reset Password";
$payload = array(
    "Password_Reset_URL" => "https://thebigstock.com/bigstock/change-password.php?id=" . $id . "&token=" . $token,
);

// ! change name
$templateName = "forget_password";
$status = sendMailTo(
    $email,
    $first_name,
    $subject,
    $payload,
    $templateName
);

if (!$status) {
    echo "<script>
    alert('something went wrong please try again');
    window.location.href='forget-password.php';
    </script>";
    exit();
}


echo "<script>
alert('A Reset Link Sent To Your Mail');
window.location.href='login.php';
</script>";
