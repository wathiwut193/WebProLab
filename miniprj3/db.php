<?php 
$host = "localhost"; 
$user = "it58160638"; 
$pass = "elementzeed"; 
$db_name = "it58160638"; 
//$con = new mysqli($host, $user, $pass, $db_name);
$con = mysqli_connect($host,$user,$pass,$dbName); 
mysqli_query("SET CHARACTER SET UTF-8");
?>