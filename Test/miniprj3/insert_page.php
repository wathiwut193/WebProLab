<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$sql = "INSERT INTO command VALUES id=$id";
$result = $con->query($sql);
?>
<html>
<head>
  <meta charset="utf8">
	<title>Add Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

  <script>
  $(document).ready(function() {
    $('#datepicker1')
    .datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
      })
    $('#datepicker2')
    .datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    })
  });
  </script>

  <style>
  label{
    font-size: 16px;
  }
  </style>

</head>
<body>
	<div class="container" style="width: 50%">
		<h1 align="center">ADD Appointment</h1>
    <br>
		<div ng-app="myApp" ng-controller="myCtrl">
			<label>Code:</label>
			<input type="text" name="Code" ng-model="Code" class="form-control"  placeholder="เลขที่คำสั่ง"/><br>
			<label>Appointment:</label>
			<input type="text" name="nameAppoint" ng-model="nameAppoint" class="form-control"  placeholder="ชื่อคำสั่ง"/><br>
     <label>Committee:</label><br>
      <input type="text" class="form-control" id="committee" ng-model="committee" placeholder="ชื่อกรรมการ" maxlength="50" require="required">
     <br><div class="col-md-1"><button class="btn btn-info"  ng-click="addNewCommittee()">+</button></div>
     <br><br>






      <label>Date Start:</label>
			<input type="text" name="datestart" ng-model="datestart" id="datepicker1" class="form-control"  placeholder="วันที่เริ่มต้น"/><br>
      <label>Date End:</label>
			<input type="text" name="dateend" ng-model="dateend" id="datepicker2" class="form-control"  placeholder="วันที่สิ้นสุด"/><br>
      <label>Link:</label>
			<input type="text" name="link" ng-model="link" class="form-control" placeholder="link เอกสาร" /><br>
			<br>
			<input type="submit" name="submit" ng-click="insertData()" class="btn btn-success " style="width: 50%" value="Submit"/><input type="submit" name="cancel" onclick="location.href='index.html'" class="btn btn-danger" style="width: 50%" value="Cancel"/>
			<br><br>
		</div>
	</div>


</body>
<script src="function.js"></script>

</html>
