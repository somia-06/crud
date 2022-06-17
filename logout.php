<?php
session_start();
if (!empty($_SESSION["user_info"])) {
    
    session_unset();
   
}
header("location: login.html");

