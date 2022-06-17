<?php 
session_start();
$email        =$_POST["email"];
$password     =md5($_POST["password"]);


$qry = "select id, name, user_name, email, password, mobile_no, gender, created_at, update_at from users where email='$email' and password ='$password'";
require_once ("connection.php");

$rst = mysqli_query($conn ,$qry);

if ($arr = mysqli_fetch_assoc($rst)) {

    $_SESSION["user_info"]=$arr;

    header("location: home.php");
   
}
else {
    header('location: login.html?error=invalid email or password');
    
}


mysqli_close($conn);