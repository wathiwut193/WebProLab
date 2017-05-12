<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$id = $_GET['id'];
$sql = "SELECT * FROM command WHERE id = $id";
$result = $con->query($sql);
?>
<!DOCTYPE html>
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
      <p><b>Code:</b> {{Code}}</p>
      
      <p><b>Appointment:</b> {{nameAppoint}}</p>
    
      <p><b>Committee:</b> {{committee}}</p>
      
      <p><b>Date start:</b> {{datestart}}</p>
      
      <p><b>Date End:</b> {{dateend}}</p>

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
                
  $scope.Code = "<?php echo $row->Code;?>";
  $scope.nameAppoint = "<?php echo $row->nameAppoint;?>";
  $scope.committee = "<?php echo $row->committee;?>";
  $scope.datestart = "<?php echo $row->datestart;?>";
  $scope.dateend = "<?php echo $row->dateend;?>";
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