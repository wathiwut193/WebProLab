<?php
$servername = "localhost";
$username = "it58160638";
$password = "elementzeed";
$dbname = "it58160638";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET NAMES UTF8");
// Check connection
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM Appointment ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_object()) {
        $rows[] = $row;
        //echo "id: " . $row->id. " - Name: " . $row->item. " " . $row->status. "<br>";
    }
    $str = "{ ";
    $str.= "\"records\":".json_encode($rows);
    $str.= " }";
} else {
    $str = "{\"records\": []}";
}

header('Content-Type: application/json');
echo $str;

// Close connection
$conn->close();