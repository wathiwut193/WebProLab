<?php 
include('db.php'); 
$query = "SELECT * FROM chat ORDER BY id"; 
mysqli_query("SET NAMES utf8");
$run = $con->query($query); 
?>

<?php
while($row = $run->fetch_array()) : 
	if ($row['onChat']==1) {
?> 
<div> 
	<span style="color:green;"><?php echo $row['name'];?> : </span> 
	<span style="color:brown;"><?php echo $row['msg']; ?></span> 
	<span style="float:right;"><?php echo $row['date']; ?></span> 
	<hr class="hr-clas" />
</div> 
<?php } endwhile; ?>

