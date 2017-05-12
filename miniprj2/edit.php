<html>
<head>
<title>Edit</title>

 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<body>

<?php

   $serverName = "localhost";
   $userName = "it58160193";
   $userPassword = "Cc2191996@";
   $dbName = "it58160193";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   $conn -> query("set names utf8");


     if(isset($_GET["id"])) {
     $strCustomerID = $_GET["id"];
   }
   

   $sql = "SELECT * FROM Note WHERE id = '".$strCustomerID."' ";

   $result = $conn->query($sql);

   $row = $result->fetch_object();

 
?>


<div data-role="page" id="page_edit">

<div data-role="header" >
    <h1>Edit Notes</h1>
    <a data-rel="back" data-role="button" data-icon="carat-l">Back</a>
    <a id="btn_deleteNote" href="delete.php?id=<?php echo $row->id ?>" onclick="return confirm('ยืนยันการลบข้อมูล ??')" data-icon="delete" class="ui-btn-right">Delete</a>

</div>
<form action="save.php"  method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
 <div class="ui-content">
    <input type="hidden" name="txtCustomerID" value="<?php echo $row->id ?>">    
    <h2>เรื่อง</h2><input type="text" name="txtName"  value="<?php echo $row->N_head ?>">
    <h4>รายละเอียด</h4><textarea type="text" name="txtEmail" ><?php echo $row->N_note ?></textarea> 
  <input id="btn_editNote" type="submit" name="submit" value="edit">
  <input class="btn btn-warning" name="submit"  value="Cancel" type="reset">
  </div>
    <script>
    function fncSubmit() {
  if(document.form1.txtName.value == "" && document.form1.txtEmail.value == "") {
    alert('โปรดป้อนเรื่องและรายละเอียด');
    document.form1.txtName.focus(),document.form1.txtEmail.focus();
    return false;
  } 
  if(document.form1.txtName.value == "") {
    alert('โปรดป้อนเรื่อง');
    document.form1.txtName.focus();
    return false;
  } 
  if(document.form1.txtEmail.value == "") {
    alert('โปรดป้อนรายละเอียด');
    document.form1.txtEmail.focus();
    return false;
  } 
  document.form1.submit();
}
</script>

</form>
</div>

</body>
</html>