<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$finish = date('d/m/Y');

$sql = "SELECT status FROM command WHERE id=$id";
$result = $con->query($sql);
$row = $result->fetch_object();
if($row->status == A){
	$sql = "UPDATE command SET dateend='$finish',status='X'WHERE id=$id";
}else{
	$sql = "UPDATE command SET dateend='-',status='A'WHERE id=$id";
}
$result = $con->query($sql);
