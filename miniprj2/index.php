<?php 
    $host = "localhost";
    $username ="it58160193";
    $password ="Cc2191996@";
    $database = "it58160193";
    $conn = mysqli_connect($host,$username,$password,$database);
    $conn -> query("set names utf8"); 

    $sql = "SELECT * FROM Note  GROUP BY N_date ORDER BY id DESC  ";

    $result = $conn->query($sql);

?>


<!DOCTYPE html> 
<html>
<head>
    <title>My Notes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <style type="text/css">
div.
 </style>
<body>
<div data-role="page" id="page_home">


<div data-role="header" >
    <h1>My Notes</h1>
    <a href="insert.php" data-icon="plus" class="ui-btn-right">Add</a>

    </div>
     <?php while($row = $result->fetch_object()){ ?>
<div class="ui-content">
    <ul data-role="listview" data-ajax="true" data-inset="true" >

       
        <li data-role="list-divider"><center><?php echo $row->N_date ?></center></li>

        <?php 

        $sql = "SELECT * FROM Note WHERE N_date ='".$row->N_date. "' ORDER BY id DESC "; 
        $conn -> query("set names utf8"); 
        $result2 = $conn->query($sql);
        while($row2 = $result2->fetch_object()) {
        ?> 
        <li><a href ="view.php?id=<?php echo $row2->id ?>" ><h2><?php echo $row2->N_head ?></h2><p><?php echo "<br>"?><?php echo $row2->N_note ?></p> </a>
        <a href="edit.php?id=<?php echo $row2->id ?>"></a>
        </li>
    <?php } 
         
    ?>
        
    </ul>
</div>
<?php  } 
          $result->close();
          ?>
</div> 

</body>
</html>