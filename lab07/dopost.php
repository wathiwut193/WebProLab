<?php
header('Content-Type: text/html; charset=utf-8');
$conn = mysqli_connect("","","","");
$conn->query('SET NAMES UTF8');

	echo "<h3>View posted data:</h3>";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	echo "<hr>";
	echo "<h3>View posted data:</h3>";
	echo "name : ".$_POST['name']."<br>";
	echo "email : ".$_POST['email']."<br>";
	echo "address : ".$_POST['address']."<br>";
	echo "sex : ".$_POST['sex']."<br>";
	echo "intr1 : ".$_POST['intr1']."<br>";
	echo "intr2 : ".$_POST['intr2']."<br>";
	echo "province : ".$_POST['province']."<br>";
	if(isset($_POST['submit'])){
		echo "string";
		$sql = "INSERT INTO lab07(fnamelname, email, sex, intr1, intr2, address, province)
		VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['sex']."','".$_POST['intr1']."','".$_POST['intr2']."','".$_POST['address']."','".$_POST['province']."')";
		mysqli_query($conn,$sql);
	}
?>
