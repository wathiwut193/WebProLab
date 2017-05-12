<!DOCTYPE html>
<html lang="en">
<head>
  <title>show_register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #00eade;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 22px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}


  </style>
</head>
<body>

<div class="container">
  <h1>รายชื่อผู้ลงทะเบียน</h1>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>หมายเลข</th>
        <th>ชื่อ-นามสกุล</th>
        <th>e-mail</th>
        <th>เพศ</th>
        <th>ความสนใจ</th>
        <th>ที่อยู่</th>
        <th>จังหวัด</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("","","","");
      $conn->query('SET NAMES UTF8');
      $sql = "SELECT * FROM lab07 natural join provinces WHERE lab07.province = provinces.PROVINCE_ID";
      $result = mysqli_query($conn,$sql);
      $j = 1;
      while($lab07 = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$j."</td>";
        echo "<td>".$lab07['fnamelname']."</td>";
        echo "<td>".$lab07['email']."</td>";
        if($lab07['sex']== M){
          echo "<td>"."ชาย"."</td>";
        }else if($lab07['sex']== F){
          echo "<td>"."หญิง"."</td>";
        }
        if($lab07['intr1'] == on && $lab07['intr2'] == on){
          echo "<td>"."เรียน"."<br/>"."เกมส์"."</td>";
        }else if($lab07['intr1'] == on){
          echo "<td>"."เรียน"."</td>";
        }else if($lab07['intr2'] == on){
          echo "<td>"."เกมส์"."</td>";
        }
        echo "<td>".$lab07['address']."</td>";
        //echo "<td>".$lab07['province']."</td>";
        echo "<td>".$lab07['PROVINCE_NAME']."</td>";
        echo "</tr>";
        $j++;
      }?>
    </tbody>
  </table>
</div>
<center><button type="button" class="btn btn-primary">Primary</button></center>

</body>
</html>