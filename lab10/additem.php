<?php
$servername = "localhost";
$username = "it58160193";
$password = "Cc2191996@";
$dbname = "it58160193";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET NAMES UTF8");

$item = $_GET['item'];

$sql = "INSERT INTO shoppinglist(item) VALUES('$item')";
$conn->query($sql);

$conn->close();

header("location: getall.php");