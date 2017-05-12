<html>
<head>
<title>Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","it58160638","elementzeed") or die("Error Connect to Database");
$objDB = mysql_select_db("it58160638");
$strSQL = "DELETE FROM Note ";
$strSQL .="WHERE id = '".$_GET["id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	?>
	<div data-role="header" >
    <h1>Delete Notes</h1>
    </div>

    <div class="ui-content">
    
	<center> <?php echo "Record Deleted.";
	echo "<meta http-equiv='refresh'content='3;URL=index.php'>"; ?>
	</div>
	<?php
}
else
{
	echo "Error Delete [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>