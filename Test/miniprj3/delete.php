<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$sql = "DELETE FROM command WHERE id=$id";
if ($con->query($sql) === TRUE) {
    echo "<meta http-equiv='refresh' content=\"1;URL='index.html'\">";
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();
?>