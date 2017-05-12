<?php
$servername = "localhost";
$username = "it58160193";
$password = "Cc2191996@";
$dbname = "it58160193";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET NAMES UTF8");

$id = $_GET['id'];
$sql = "DELETE
        FROM shoppinglist
        WHERE id = $id";
$conn->query($sql);

$conn->close();

//
header("location: getall.php");
/*
$sql = "SELECT *
        FROM shoppinglist
        ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_object()) {
        $rows[] = $row;
        //echo "id: " . $row->id. " - Name: " . $row->item. " " . $row->status. "<br>";
    }
    $str = "{ ";
    $str.= "\"items\":".json_encode($rows);
    $str.= " }";
} else {
    $str = "{ \"items\": \"0 results\" }";
}

header('Content-Type: application/json');
echo $str;

// Close connection
$conn->close();

*/
