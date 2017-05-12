<html>
<head>
<meta charset="utf-8">
  <title>Insert </title>
 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
    .red
{
    background-color:red;
}
    </style>
  
</head>
<body background="bgadd.png">
<div data-role="header">
    <a data-rel="back" data-role="button" data-icon="carat-l">Back</a>

    <h2>Add Note</h2>
  </div>


<?php
session_start();

$host = "localhost";
$username ="it58160193";
$password = "Cc2191996@";
$db = "it58160193";

$conn = new mysqli($host, $username, $password, $db);
$conn->query("set names utf8");



if(isset($_POST['submit'] )){
  $N_head    = addslashes($_POST['N_head']);
  $N_note     = addslashes($_POST['N_note']);
  $N_date   = date('Y-m-d');

    $sql = "INSERT INTO Note(N_head, N_note , N_date)
         VALUES('$N_head','$N_note','$N_date')";

      if ($conn->query($sql)) {
         //echo"<center><div class = 'alert alert-success'>INSERT A SUCCESS</div>";

         echo "<meta http-equiv='refresh'content='3;URL=index.php'>";
      }

} else { ?>



<form name="form1" method="post" action="insert.php" onSubmit="JavaScript:return fncSubmit();"> 
<div class="ui-content">
<h2>เรื่อง</h2><input name="N_head" type="text" id="N_head" class="form-control" placeholder="Title...">
<h4>รายละเอียด</h4>
<textarea  name="N_note"
 type="text" id="N_note" class="form-control" placeholder="Content..."></textarea> 

<input class="btn btn-info" type="submit" name="submit" value="Add">
<input class="btn btn-warning" name="submit"  value="Cancel" type="reset">

</div>
  <script>
  
 $('input[type="submit"]').click(function(){
    if(!$(this).hasClass('red'))
          $(this).addClass('red');
});

       
    function fncSubmit() {
  if(document.form1.N_head.value == "" && document.form1.N_note.value == "") {
    alert('โปรดป้อนเรื่องและรายละเอียด');
    document.form1.N_head.focus(),document.form1.N_note.focus();;
    return false;
  }if(document.form1.N_head.value == "") {
    alert('โปรดป้อนเรื่อง');
    document.form1.N_head.focus();
    return false;

  }if(document.form1.N_note.value == "") {
    alert('โปรดป้อนรายละเอียด');
    document.form1.N_note.focus();
    return false;
  document.form1.submit();
  }
}


</script>


</form>
  </body>

<?php
}
?>
</body>
</html>