<?php 
$host = "localhost"; 
$user = "it58160426"; 
$pass = "it58160426"; 
$db_name = "it58160426"; 
//$con = new mysqli($host, $user, $pass, $db_name);
$con = mysqli_connect($host,$user,$pass,$dbName); 
mysqli_query("SET CHARACTER SET UTF-8");
?>