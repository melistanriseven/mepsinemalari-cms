<?php
//veri tabanı bağlantısı
session_start();
$host = "localhost"; 
$user = "root"; 
$password = "12345678"; 
$dbname = "cms"; 

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>