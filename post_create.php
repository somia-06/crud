<pre>
<?php

// var_dump($_POST);
// var_dump($_FILES);

session_start();
if (empty($_SESSION["user_info"])) {
 header('location: login.html?loginfirst');
}
else {
  $user =$_SESSION["user_info"];

  $body = $_POST["body"];

require_once ("connection.php");
$qry ="insert into posts (body, users_id ,category) values ('$body', ". $user["id"]." ,'freind' )";
$rsl= mysqli_query($conn ,$qry);
$post_id = mysqli_insert_id($conn);

if ($_FILES == true && $_FILES['imgs']['name']) {
  for ($i=0; $i <count($_FILES["imgs"]["name"]) ; $i++) { 
    $file_name = "storage/posts".date("ymdhis").$_FILES["imgs"]["name"][$i];
move_uploaded_file($_FILES["imgs"]["tmp_name"][$i] ,$file_name );

$qry = "insert into post_img (url , posts_id) values ( '$file_name' , $post_id )" ;
$rslt = mysqli_query($conn , $qry);
header("location: home.php");

}
}
else {
  $file_name="";
  
}


mysqli_close($conn);

}


