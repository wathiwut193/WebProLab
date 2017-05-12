<?php
$con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638");
$data=json_decode(file_get_contents("php://input"));
$id = $_GET['id'];
$sql = "DELETE FROM Appointment1 WHERE id = $id";
$con->query("SET NAMES UTF8");
$result = $con->query($sql);
if(mysqli_query($con,$sql)){
          echo "Delete success";
        }
        else{
          echo "Error";
        }

?>