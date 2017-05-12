
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Form Validation</title>
</head>
<body>
<h3>แบบฟอร์มลงทะเบียน</h3>
<form action="dopost.php" method="post" class="a">
    ชื่อ-นามสกุล: <br/>
    <input type="text" class="text" name="name" id="name" /> <br/>
    อีเมล: <br/>
    <input type="email" class="text" name="email" id="email" /> <br/>
    เพศ: <br/>
    <input type="radio" class="radio" name="sex" id="sex1" value="M" /> ชาย
    <input type="radio" class="radio" name="sex" id="sex2" value="F" /> หญิง
    <br/>
    ความสนใจ: <br/>
    <input type="checkbox" class="checkbox" name="intr1" id="intr1" /> เรียน
    <input type="checkbox" class="checkbox" name="intr2" id="intr2" /> เกมส์
    <br/>
    ที่อยู่: <br/>
    <textarea class="text" name="address" id="address" rows="4" cols="50" ></textarea>
    <br/>
    จังหวัด: <br/>
    <select name="province" id="province">
        <option value="">---เลือกจังหวัด---</option>
          <?php 
          include('db.php');
          $query = "select * from provinces";
          $result = $con->query($query);
          while($row = $result->fetch_array()){ ?>
            <option value="<?php echo $row['PROVINCE_ID']; ?>"><?php echo $row['PROVINCE_NAME']; ?></option>
          <?php } ?>
        </select><br/>

    <br/><br/>
    <input type="submit" id="submit" value="Submit" name="submit" />
</form>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$('#submit').on('click',function(event){
    var valid = true;
    errorMessage = "";

    if ($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
    }

    if ($('#email').val() == '') {
        errorMessage += "โปรดป้อน email\n";
        valid = false;
    }

    if(valid && ($('#email').val().length > 0) && !$('#email').val().match(/^[\w][\w\-\.]*\@[\w][\w\-]*(\.[\w][\w\-]*)+([\s,]+[\w][\w\-\.]*\@[\w][\w\-]*(\.[\w][\w\-]*)+)?$/))
    {
        errorMessage += "โปรดป้อน email ให้ถูกต้อง\n";
        valid = false;
    }

    if($('#sex1').prop("checked") == false && $('#sex2').prop("checked") == false){
	    errorMessage += "โปรดเลือก เพศ \n";
	    valid = false;
	}

	if($('#intr1').prop("checked") == false && $('#intr2').prop("checked") == false){
	    errorMessage += "โปรดเลือกความสนใจอย่างน้อย 1 อย่าง \n";
	    valid = false;
	}

    if ($('#address').val() == '') {
        errorMessage += "โปรดป้อนที่อยู่\n";
        valid = false;
    }

    if($('#province').val() == ''){
		errorMessage += "โปรดเลือกจังหวัด \n";
		valid = false;
	}

    if ( !valid && errorMessage.length > 0) {
        alert(errorMessage);
        event.preventDefault();
    }
});
</script>
</body>
</html>
    