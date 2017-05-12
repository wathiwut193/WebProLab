<?php
$con=mysqli_connect("localhost","it58160638","elementzeed","it58160638");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$finish = date('Y/m/d');

$sql = "SELECT status FROM Appointment1 WHERE id=$id";
$result = $con->query($sql);
$row = $result->fetch_object();
if($row->status == A){
	$sql = "UPDATE Appointment1 SET end='$finish',status='X'WHERE id=$id";
}else{
	$sql = "UPDATE Appointment1 SET end='-',status='A'WHERE id=$id";
}
$result = $con->query($sql);
?>