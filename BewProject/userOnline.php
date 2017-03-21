<?php 
include('db.php');
$query = "SELECT * FROM chat ORDER BY id";
mysqli_query("SET NAMES utf8");
$run = $con->query($query); 
?>

<?php
session_start();
while($row = $run->fetch_array()) : 
	if ($row['status']== 1 && $row['name']!=$_SESSION['$name'] && $row['msg'] == NULL) {
?> 
<div> 
	<span style="color:green;"><?php echo $row['name'];?></span>
	<hr class="hr-clas" />
</div> 
<?php } endwhile; ?>

