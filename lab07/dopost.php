<?php
echo "<h3> View posted data:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<hr>";
echo "<h3>View Invidual data : </h3>";
echo $_post['name']."<br/>";
echo $_post['email']."<br/>";
echo $_post['address']."<br/>"; 

?>