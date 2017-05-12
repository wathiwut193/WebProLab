<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$Code =$_GET['Code'];
$nameAppoint =$_GET['nameAppoint'];
$committee =$_GET['committee'];
$datestart =$_GET['datestart'];
$dateend =$_GET['dateend'];
$link =$_GET['link'];

$sql = "SELECT * FROM command WHERE id=$id";
$result = $con->query($sql);

if($start != null && $end == null){
	$sql = "UPDATE command SET Code='$Code', nameAppoint='$nameAppoint', committee='$committee', datestart='$datestart',dateend='$dateend', status='A', link='$link' WHERE id=$id";
}else{
	$sql = "UPDATE command SET Code='$Code', nameAppoint='$nameAppoint', committee='$committee', datestart='$datestart', dateend='$dateend',status='X', link='$link' WHERE id=$id";
}
$result = $con->query($sql);
?>