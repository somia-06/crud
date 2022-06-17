<?php

require_once ("connection.php");
session_start();
$postinfo =$_SESSION["post_Info"] ;
$post_id = $postinfo["id"];

$query = "delete from posts where id= $post_id";
$rslt = mysqli_query($conn , $query);

if ($rslt) 
{
        header("location: home.php?deletesuccess");
}   


mysqli_close($conn);