<?php
$servername = "localhost";
$username = "it58160426";
$password = "it58160426";
$dbname = "it58160426";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET NAMES UTF8");
// Check connection
if (!$conn) die("Connection failed: " . mysqli_connect_error());

if(isset($_GET['datestart']) && isset($_GET['dateend'])){
$a = $_GET['datestart'];
$b = $_GET['dateend'];
if($a <= $b){
  $sql = "SELECT * FROM  command WHERE (datestart >=  '$a' && dateend <= '$b') || (dateend >= '$a' && dateend <= '$b')";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_object()) {
        $rows[] = $row;
        
    }
    $str = "{ ";
    $str.= "\"records\":".json_encode($rows);
    $str.= " }";
} else {
    $str = "{\"records\": []}";
}

echo $str;

  header("Content-Type: application/json; charset=UTF-8");

}
}else{
$sql = "SELECT * FROM command ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_object()) {
        $rows[] = $row;

    }
    $str = "{ ";
    $str.= "\"records\":".json_encode($rows);
    $str.= " }";
} else {
    $str = "{\"records\": []}";
}

header('Content-Type: application/json');
echo $str;
}
// Close connection
$conn->close();