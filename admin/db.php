<?php
session_start();
$server = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'UcpBlog';

$con = mysqli_connect($server, $username, $pass, $dbname);
if($con){
//  echo"connection sucessful";
}else{
  
    die("connection failed".mysqli_connect_errno());
}


?>