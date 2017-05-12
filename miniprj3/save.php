<?php
//include('db.php');
$con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638"); 
$id = $_GET['id'];
$con->query("SET NAMES UTF8");
$code = $_GET['code'];
$AP_name = $_GET['AP_name'];
$Com_name = $_GET['Com_name'];
$start = date('Y-m-d',strtotime($_GET['start']));
if ($_GET['end']=="") {
    $end = "-";
}else{
    $end = $_GET['end'];
}
$status = "Active";
$link = $_GET['link'];

$sql = "UPDATE Appointment SET 
			code = '$code' ,
			AP_name = '$AP_name' ,
			Com_name = '$Com_name' ,
			start = '$start' , 
			end = '$end'
			WHERE id = $id ";
$con->query($sql);
$con->close();

header("location: getall.php");
?>