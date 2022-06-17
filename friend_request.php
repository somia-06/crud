
<?php
require_once("nav.html");
require_once("connection.php");
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>


<body>

 <?php

$user = $_SESSION["user_info"];


// $query = "select id ,user_name,gender,created_at from users where id !=". $user["id"];
$query = "select u.id,u.user_name,u.gender,u.created_at   ,(select request from freinds where users_id=". $user["id"]." and friend_id =u.id) f_request from users u where u.id !=". $user["id"];

$result = mysqli_query($conn ,$query);
while($selected_user= mysqli_fetch_assoc($result)){

 ?>

<div class="contanier w-25 m-auto bg-light">
 <div class=" mt-3 col-md-2 text-center mx-5">
  <img src="storage/<?= $selected_user["gender"] ?>.png" class="rounded-circle m-2" style="width:100px; height: 100px" alt="profile_image">
  <h6 class="py-2"><?= $selected_user["user_name"]?></h6>
<?php



?>
<?php
if (empty($selected_user["f_request"])){
  ?>
  <a href="add.php?id=<?= $friend_id = $selected_user["id"] ?>" class="text-decoration-none h5 text-primary ">Add</a>
<?php
     }else{
      ?>
        <a href="add.php?status=remove&id=<?= $friend_id = $selected_user["id"] ?>" class="text-decoration-none h5 text-danger ">Remove</a>

<?php
     }
?>

  
</div> 

</div>
<?php 
}
mysqli_close($conn);
?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html