<?php
    $con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638"); 
    $data=json_decode(file_get_contents("php://input"));
    $con->query("SET NAMES UTF8");
    if(count($data)>0){
      $code = mysqli_real_escape_string($con,$data->code);
      $AP_name = mysqli_real_escape_string($con,$data->AP_name);
      $Com_name = mysqli_real_escape_string($con,$data->Com_name);
      $start = mysqli_real_escape_string($con,$data->start);
      $end = mysqli_real_escape_string($con,$data->end);
      $link = mysqli_real_escape_string($con,$data->link);
      $query="insert into Appointment1(code,AP_name,Com_name,start,end,status,link) values('$code','$AP_name','$Com_name','$start','$end','A','$link')"; 
        if(mysqli_query($con,$query)){
          echo "Data Inserted";
        }
        else{
          echo "Error";
        }
    }
?>
<html>
    <head>
        <title>insert Appointment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
        </style>
    </head>
    <body> 
    <div class="container">
    <h1>insert Appointment</h1>
     <form ng-submit="insertData()" ng-app="myApp" ng-controller="myCtrl"  >
      <label><h2>เลขที่คำสั่ง:</h2></label>
      <input type="text" class="form-control" id="code" placeholder="เลขที่คำสั่ง" name="code" ng-model="code" required/>
      <label><h2>ชื่อคำสั่ง:</h2></label>
      <input type="text" class="form-control" id="AP_name" placeholder="ชื่อคำสั่ง" name="AP_name" ng-model="AP_name" required/>
      <label><h2>ชื่อกรรมการ:</h2></label>
      <input type="text" class="form-control" id="Com_name" placeholder="ชื่อกรรมการ" name="Com_name" ng-model="Com_name" required/>
      <label><h2>วันที่เริ่มคำสั่ง:</h2></label>
      <input type="date" class="form-control" id="start" placeholder="วันที่เริ่มคำสั่ง" name="start" ng-model="start" required/>
      <label><h2>วันที่สิ้นสุดคำสั่ง:</h2></label>
      <input type="date" class="form-control" id="end" placeholder="วันที่สิ้นสุดคำสั่ง" name="end" ng-model="end" required/>
      <label><h2>link:</h2></label>
      <input type="text" class="form-control" id="link" placeholder="link" name="link" ng-model="link" required/>
      <br>
      <center>
      <center><button class="btn btn-info btn-lg">Insert</button>
              <button class="btn btn-danger btn-lg" ng-click="Cancel()">Cancel</button></center>
      </center>
    </form>
    </body>
    <script src="function.js">
    </script>
</html>