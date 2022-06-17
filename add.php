<?php
session_start();
if (empty($_SESSION["user_info"])) {
    header('location: login.html?loginfirst');
} else {
    $friend_id =$_GET["id"];
    $user =$_SESSION["user_info"];
    require_once("connection.php");
    
    if (!empty($_GET["status"]) && $_GET["status"]=="remove") {
       

        $qry = "delete from freinds where friend_id=$friend_id and users_id =".$user['id'];
       
    }
    else {
         $qry = "insert into freinds (users_id ,friend_id) values (" .$user['id']." ,$friend_id )";
     }
    $rslt =mysqli_query($conn ,$qry);
    mysqli_close($conn); 
    
}
header("location: friend_request.php ");
