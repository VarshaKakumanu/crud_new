<?php
session_start();
include 'connection.php';

if (isset($_POST['n_submit'])) 
{
   
   $username = $_POST["n_username"];
   $password = $_POST["n_password"];

 $sql = "SELECT `username` FROM credentials WHERE `username` = '$username' and `password` = '$password' ";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
    //session_register("usermail");
    $_SESSION['login_user'] = $username;
    // print_r($_SESSION);
   header("location: to_do_page.php");
 }else {
    $error = "Your Login Name or Password is invalid";

 }
}