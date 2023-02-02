<?php
session_start();
include "function.php";
$obj = new Operations;

$user_id = 0;
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
}

// clean previous session
$_SESSION['hash_id']="";

// ============= trigger download ============= \\
$hashID = Utils::cleaner($_GET['id'] ?? "0");

// fetch image information
$where = "WHERE hash_id = '$hashID'";
$image = $obj->getSingle('image_tbl', $where);

// redirect to home page
if (!$image) {
  Utils::htmlRedirect('index.php', 'Image Not Found');
}

// ! after succesfull payment 

// ==============  add image hash id to history table  ================= \\ 
// fetch user information
$user = $obj->getSingle('user_tbl', "WHERE id = '" . $user_id . "'");

// redirect to login page
if (!$user) {
  Utils::htmlRedirect("login.php?redirect=checkout.php?id=" . $hashID);
}

// fetch download history
$data=[
  "user_id"=>$user_id,
  "image_hash_id"=>$hashID,
  "image_price"=>$image['image_price'],
];
$downloadHistory = $obj->insert('download_history', $data);

// ==============  increase download count  ================= \\ 
$obj->dbSQL("UPDATE `image_tbl` SET `download_count` = `download_count` + 1 WHERE hash_id = '$hashID'");

$_SESSION['hash_id'] = $hashID;
Utils::phpRedirect('admin/download_file.php?redirect=/bigstock');





// include "functions.php";
// $obj = new Operations;
// $api = Instamojo\Instamojo::init($authType,[
//         "client_id" =>  'mIdrx81RbObgMUroKRbJspDQUo3DpCWcmEHClMtT',
//         "client_secret" => 'ZnlohGHC0uqV3OmdO8NGJCy7oPZqYqUqooRc9fWVH0SdWOMdDA0dAF1kOwczpa0EsjdtYr0HolQ44vneoxKqmh0hxH8rxWXDzAYHpIdjrdYz18AVz6l5GApWwiJ8CCH6',
//         "username" => 'rudraprasadpanda8@gmail.com', /** In case of user based authentication**/
//         "password" => 'Rudra@9932' /** In case of user based authentication**/

//     ]);

//     try {
//     $response = $api->createPaymentRequest(array(
//         "purpose" => "FIFA 16",
//         "amount" => "3499",
//         "send_email" => true,
//         "email" => "foo@example.com",
//         "redirect_url" => "https://thebigstock.com/bigstock/"
//         ));
//     print_r($response);
// }
// catch (Exception $e) {
//     print('Error: ' . $e->getMessage());
// }
$ch = curl_init();
$token = "6591d608f53c5123fad49aa4f6ff3dd5";
curl_setopt($ch, CURLOPT_URL, 'https://api.instamojo.com/v2/payment_requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

$payload = array(
  'purpose' => 'FIFA 16',
  'amount' => '2500',
  'buyer_name' => 'John Doe',
  'email' => 'foo@example.com',
  'phone' => '9999999999',
  'redirect_url' => 'https://thebigstock.com/bigstock/',
  'send_email' => 'True',
  'webhook' => 'https://thebigstock.com/bigstock/',
  'allow_repeated_payments' => 'False',
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
print_r($response);
