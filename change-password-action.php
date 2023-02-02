<?php
include "function.php";
$Controller = new Operations;

// incoming requests
$id = Utils::cleaner($_POST['id'] ?? "");
$token = Utils::cleaner($_POST['token'] ?? "");
$password = md5(Utils::cleaner($_POST['password'] ?? ""));

$forget_password_table = "forget_password";

$where = "WHERE id = '" . $id . "' AND token= '" . $token . "'";
$result = $Controller->getSingle($forget_password_table, $where);
// if account not found
if (!$result) {
    echo "<script>
alert('Invalid Token);
window.location.href='login.php';
</script>";
    exit();
}


$user_table = "user_tbl";

$email = $result['email'];
$user_id = $result['user_id'];

$data = array(
    "password" => $password,
);

$Controller->update($user_table, $data, $user_id);

$Controller->delete($forget_password_table, $id);

echo "<script>
alert('Password Change Successfully');
window.location.href='login.php';
</script>";
