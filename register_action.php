<?php
include('function.php');
$obj = new Operations;
//if(isset($_POST['submit'])){
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$pass = $_POST['password'];
$password = $_POST['confirmpassword'];

$data = array(
    'first_name' =>  $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'mobile' => $_POST['mobile'],
    'role' => $_POST['role'],
    'password' => md5($_POST['confirmpassword'])
);
//$usercount = $obj->insert('user_tbl',$data);

$where = "WHERE email='$email'";
$usercount1 = $obj->getCounts('user_tbl', $where);
if ($usercount1 > 0) {
    echo "<script>
alert('Email Already Registered.');
window.location.href='login.php';
</script>";
} else {
    $success = $obj->insert("user_tbl", $data);
    echo "<script>
 alert('Registered Successfully.Please Login.');
window.location.href='login.php';
</script>";
}


        /*if($usercount > 0){
            echo "<script>
alert('Email Already Registered.');
window.location.href='login.php';
</script>";
}
    
    else{
$success = $obj -> insert("user_tbl",$data);
                 echo "<script>
alert('Registered Successfully.Please Login.');
window.location.href='login.php';
</script>";


    }
      
 
   
   }
   else{
        echo "<script>
alert('Password And Confirm Password Does Not Matched.');
window.location.href='login.php';
</script>";*/
 //  }
