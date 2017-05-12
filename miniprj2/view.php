html>
<head>
<title>View</title>

 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script type="text/javascript">     
    $(document).on("pageinit","#page_view",onPageInit);

    function onPageInit(event)
    {           
        $(document).on("swipeleft","#page_view",onSwipeLeft);
        <?php 
        if ($_GET['id'] > 0)
        {
            ?>              
            $(document).on("swiperight","#page_view",onSwipeRight);
            <?php 
        }
        ?>          
    }               
    function onSwipeLeft(event)
    {
        //alert ("left");
        //$.mobile.changePage("test.php?id=<?php echo $_GET['id'] ?>", { transition: "slide", allowSamePageTransition: true, reloadPage: true} );       
        $.mobile.changePage("index.php", { transition: "none", allowSamePageTransition: true });
    }
    function onSwipeRight(event)
    {   
        //alert ("right");
        //$.mobile.changePage("test.php?id=<?php echo $_GET['id']  ?>", { transition: "slide", allowSamePageTransition: true, reloadPage: true} );
        $.mobile.changePage("edit.php?id=<?php echo $_GET['id']  ?>", { transition: "none", allowSamePageTransition: true });            
    }       
</script>
 </head>
<body>
<?php

 if(isset($_GET["id"]))
   {
     $strCustomerID = $_GET["id"];
   }
  
   $serverName = "localhost";
   $userName = "it58160193";
   $userPassword = "Cc2191996@";
   $dbName = "it58160193";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   $conn -> query("set names utf8");

   $sql = "SELECT * FROM Note WHERE id= '".$strCustomerID."'";

   $result = $conn->query($sql);

   $row = $result->fetch_object();

?>


<div data-role="page" id="page_view">



<div data-role="header" >
    <h1>View Notes</h1>
    <a data-rel="back" data-role="button" data-icon="carat-l">Back</a>

    </div>

 <div class="ui-content"> 
 <input type="hidden" name="txtCustomerID" value="<?php echo $row->id ?>">  
    <h2>เรื่อง : <?php echo $row->head ?></h2> 
  
    <h3>รายละเอียด</h3> <p><?php echo $row->data ?></p> 
  </div>

</form>
</div>

</body>
</html>



