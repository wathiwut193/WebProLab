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
    <title>Edit Appointment</title>
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
        <h2 align="center">ADD Appointment</h2>
    <br>
        <div ng-app="myApp" ng-controller="myCtrl">
            <label>Code:</label>
            <input type="text" name="Code" ng-model="Code" class="form-control" disabled="disabled"/><br>
            <label>Appointment:</label>
            <input type="text" name="nameAppoint" ng-model="nameAppoint" class="form-control"/><br>
            <label>Committee:</label>
            <input type="text" name="committee" ng-model="committee" class="form-control"/><br>
            <label>Date Start:</label>
            <input type="text" name="datestart" ng-model="datestart" id="datepicker1" class="form-control"/><br>
            <label>Date End:</label>
            <input type="text" name="dateend" ng-model="dateend" id="datepicker2" class="form-control"/><br>
            <label>Link:</label>
            <input type="text" name="link" ng-model="link" class="form-control" /><br>
            <br>
            <input type="submit" name="submit" ng-click="saveData()" class="btn btn-success" style="width: 50%" value="Update"/><input type="submit" name="cancel" onclick="location.href='index.html'" class="btn btn-danger" style="width: 50%" value="Cancel"/>
            <br><br>
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
  $scope.link = "<?php echo $row->link;?>";
  <?php }} ?>

  $http.get("getall.php").then(function(response) {
    $scope.data = response.data.Item;
  });
  $scope.saveData = function() {
    $http.get("save.php?id=<?php echo $_GET['id'];?>&Code=" + $scope.Code + "&nameAppoint=" + $scope.nameAppoint + "&committee=" + $scope.committee + "&datestart=" + $scope.datestart + "&dateend=" + $scope.dateend + "&link=" + $scope.link)
    .then(function mySuccess(response) {
      document.location = "index.html";
    });
  }
  $scope.Cancel = function() {
    document.location = "index.html";
  }
});
</script>

</html>
