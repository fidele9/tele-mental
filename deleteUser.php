<?php

if(isset($_GET["user_ID"]) ){
    $user_ID= $_GET["user_ID"];

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

$connection=new mysqli($host,$username,$password,$database);
$sql="DELETE FROM users WHERE user_ID= $user_ID";
$connection->query($sql);
}

header('location:users.php');
exit;
?>