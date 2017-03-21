
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
            <option value="1">กรุงเทพมหานคร   </option>
            <option value="2">สมุทรปราการ   </option>
            <option value="3">นนทบุรี   </option>
            <option value="4">ปทุมธานี   </option>
            <option value="5">พระนครศรีอยุธยา   </option>
            <option value="6">อ่างทอง   </option>
            <option value="7">ลพบุรี   </option>
            <option value="8">สิงห์บุรี   </option>
            <option value="9">ชัยนาท   </option>
            <option value="10">สระบุรี</option>
            <option value="11">ชลบุรี   </option>
            <option value="12">ระยอง   </option>
            <option value="13">จันทบุรี   </option>
            <option value="14">ตราด   </option>
            <option value="15">ฉะเชิงเทรา   </option>
            <option value="16">ปราจีนบุรี   </option>
            <option value="17">นครนายก   </option>
            <option value="18">สระแก้ว   </option>
            <option value="19">นครราชสีมา   </option>
            <option value="20">บุรีรัมย์   </option>
            <option value="21">สุรินทร์   </option>
            <option value="22">ศรีสะเกษ   </option>
            <option value="23">อุบลราชธานี   </option>
            <option value="24">ยโสธร   </option>
            <option value="25">ชัยภูมิ   </option>
            <option value="26">อำนาจเจริญ   </option>
            <option value="27">หนองบัวลำภู   </option>
            <option value="28">ขอนแก่น   </option>
            <option value="29">อุดรธานี   </option>
            <option value="30">เลย   </option>
            <option value="31">หนองคาย   </option>
            <option value="32">มหาสารคาม   </option>
            <option value="33">ร้อยเอ็ด   </option>
            <option value="34">กาฬสินธุ์   </option>
            <option value="35">สกลนคร   </option>
            <option value="36">นครพนม   </option>
            <option value="37">มุกดาหาร   </option>
            <option value="38">เชียงใหม่   </option>
            <option value="39">ลำพูน   </option>
            <option value="40">ลำปาง   </option>
            <option value="41">อุตรดิตถ์   </option>
            <option value="42">แพร่   </option>
            <option value="43">น่าน   </option>
            <option value="44">พะเยา   </option>
            <option value="45">เชียงราย   </option>
            <option value="46">แม่ฮ่องสอน   </option>
            <option value="47">นครสวรรค์   </option>
            <option value="48">อุทัยธานี   </option>
            <option value="49">กำแพงเพชร   </option>
            <option value="50">ตาก   </option>
            <option value="51">สุโขทัย   </option>
            <option value="52">พิษณุโลก   </option>
            <option value="53">พิจิตร   </option>
            <option value="54">เพชรบูรณ์   </option>
            <option value="55">ราชบุรี   </option>
            <option value="56">กาญจนบุรี   </option>
            <option value="57">สุพรรณบุรี   </option>
            <option value="58">นครปฐม   </option>
            <option value="59">สมุทรสาคร   </option>
            <option value="60">สมุทรสงคราม   </option>
            <option value="61">เพชรบุรี   </option>
            <option value="62">ประจวบคีรีขันธ์   </option>
            <option value="63">นครศรีธรรมราช   </option>
            <option value="64">กระบี่   </option>
            <option value="65">พังงา   </option>
            <option value="66">ภูเก็ต   </option>
            <option value="67">สุราษฎร์ธานี   </option>
            <option value="68">ระนอง   </option>
            <option value="69">ชุมพร   </option>
            <option value="70">สงขลา   </option>
            <option value="71">สตูล   </option>
            <option value="72">ตรัง   </option>
            <option value="73">พัทลุง   </option>
            <option value="74">ปัตตานี   </option>
            <option value="75">ยะลา   </option>
            <option value="76">นราธิวาส   </option>
            <option value="77">บึงกาฬ</option>
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
    