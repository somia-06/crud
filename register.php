
<?php
$name        =$_POST["name"];
$user_name   =$_POST["user_name"];
$password    =md5($_POST["password"]);
$email       =$_POST["email"];
$gender      =$_POST["gender"];
$mobile        =$_POST["mobile"];

$qry ="insert into users (name , user_name, email, password, mobile_no, gender) 
values ('$name' ,'$user_name' ,'$email' , '$password ' , '$mobile', '$gender')";

$conn =mysqli_connect("localhost","root","" ,"media");

$rslt= mysqli_query($conn ,$qry);

echo mysqli_error($conn);
header('location: login.html');

mysqli_close($conn);

