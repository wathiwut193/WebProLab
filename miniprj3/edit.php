<?php
$con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638"); 
$id = $_GET['id'];
$sql = "SELECT * FROM Appointment WHERE id = $id";
$con->query("SET NAMES UTF8");
$result = $con->query($sql);
?>
<html>

<head>
    <title>EDIT APPOINTMENT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
     <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="mystyle.css">

    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
        $(function() {
            $("#datepicker2").datepicker();
        });
    </script> 
    <style>
        body {
            font-family: 'Kanit', sans-serif;
         }
    </style>
</head>
<body>
    <div class="container">
            <h2 style="text-align: center;">Edit Appointment</h2>
            <form ng-submit="edit()" ng-app="myApp" ng-controller="myCtrl"  >
                <label><h2>เลขที่คำสั่ง:</h2></label><input  type="text" maxlength="50" class="form-control" ng-model="code" required/>
                <label><h2>ชื่อคำสั่ง:</h2></label><input  type="text" class="form-control" maxlength="1000" ng-model="AP_name" required/>
                <label><h2>ชื่อกรรมการ:</h2></label><input  type="text" class="form-control" ng-model="Com_name"/>
                <label><h2>วันที่เริ่มคำสั่ง:</h2></label><input  type="text" id="datepicker" class="form-control" ng-model="start" required/>
                <label><h2>วันที่สิ้นสุดคำสั่ง:</h2></label><input  type="text" id="datepicker2" class="form-control" ng-model="end"/>
                <label><h2>link:</h2></label><input type="text" value="Link" class="form-control" disabled ng-model="link" maxlength="255"/>
                <br>
                <center><button class="btn btn-info btn-lg">Update</button>
                    <button class="btn btn-danger btn-lg" ng-click="Cancel()">Cancel</button></center>
            </form>
        </div>
    </div>
     <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http ) {
            <?php
            while($row = $result->fetch_object()){
                if($_GET['id'] == $row->id){
            ?>
                $scope.temp = "";
                $scope.Count = 1;
                $scope.code = "<?php echo $row->code;?>";
                $scope.AP_name = "<?php echo $row->AP_name;?>";
                $scope.Com_name = "<?php echo $row->Com_name;?>";
                $scope.start = "<?php echo $row->start;?>";
                $scope.end = "<?php echo $row->end;?>";
                $scope.link = "<?php echo $row->link;?>";
        <?php }} ?>

            $http.get("getall.php").then(function(response) {
                  $scope.data = response.data.Item;
            });
            $scope.edit = function() {
                $http.get("save.php?id=<?php echo $_GET['id'];?>&code=" + $scope.code + "&AP_name=" + $scope.AP_name + "&Com_name=" + $scope.Com_name + "&start=" + $scope.start + "&end=" + $scope.end + "&link=" + $scope.link)
                    .then(function mySuccess(response) {
                        document.location = "index.html";
                    });
            }
            $scope.Cancel = function() {
                document.location = "index.html";
            }
        });
    </script>
</body>

</html>