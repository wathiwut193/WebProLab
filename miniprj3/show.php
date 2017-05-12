<?php
$con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638"); 
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$sql = "SELECT * FROM Appointment1 WHERE id = $id";
$result = $con->query($sql);
?>
<html>
<head>
  <meta charset="utf8">
	<title>View Appointment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <style>
    p{
      font-size: 20px;
    }
  </style>
</head>
<body>
	<div class="container" style="width: 50%">
		<h1 align="center">Appointment</h1>
    <br>
		<div ng-app="myApp" ng-controller="myCtrl">
      <p><b>เลขที่คำสั่ง:</b> {{code}}</p>
      <p><b>ชุดคำสั่ง:</b> {{AP_name}}</p>
      <p><b>กรรมการ:</b> {{Com_name}}</p>
      <p><b>วันที่เริ่มคำสั่ง:</b> {{start}}</p>
      <p><b>วันที่สิ้นสุด:</b> {{end}}</p>
      <p><b>Status:</b>
          <span ng-if="n == 'A'">Active</span>
          <span ng-if="n == 'X'">Expired</span>
      </p>
      
      <p><b>Link:</b> {{link}}</p>
			<br>
      <center><input type="submit" name="submit" ng-click="back()" class="btn btn-danger btn-sm" style="width: 50%;" value="Back"/></center>
			
		</div>
	</div>
</body>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http ) {
  <?php
  while($row = $result->fetch_object()){
    if($_GET['id'] == $row->id){
  ?>
                
  $scope.code = "<?php echo $row->code;?>";
  $scope.AP_name = "<?php echo $row->AP_name;?>";
  $scope.Com_name = "<?php echo $row->Com_name;?>";
  $scope.start = "<?php echo $row->start;?>";
  $scope.end = "<?php echo $row->end;?>";
  $scope.status = "<?php echo $row->status;?>";
  $scope.link = "<?php echo $row->link;?>";
  $scope.n = $scope.status;

  <?php }} ?>

  $http.get("getall.php").then(function(response) {
    $scope.data = response.data.Item;
  });
  $scope.back = function() {
    document.location = "index.html";
  }
});
</script>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</html>