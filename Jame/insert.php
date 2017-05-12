
<!DOCTYPE html>
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
       body, html{
     height: 100%;
 	background-repeat: no-repeat;
 	background-color: #d3d3d3;
  font-family: 'Kanit', sans-serif;
}

.main{
 	margin-top: 70px;
}

h1.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

hr{
	width: 10%;
	color: #fff;
}

.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 330px;
    padding: 40px 40px;

}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
}
        </style>
    </head>
    <body> 
    <div class="container">
    <h1>Insert Appointment</h1>
     <form ng-submit="insertData()" ng-app="myApp" ng-controller="myCtrl"  >
       <div class="row">
       <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
         <label><h3>เลขที่คำสั่ง:</h3></label>
      <input type="text" class="form-control" id="code" placeholder="เลขที่คำสั่ง" name="code" ng-model="code"/>
       </div> 
      <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
      <label><h3>ชื่อคำสั่ง:</h3></label>
      <input type="text" class="form-control" id="AP_name" placeholder="ชื่อคำสั่ง" name="AP_name" ng-model="AP_name"/>
      </div>
      <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
      <label><h3>ชื่อกรรมการ:</h3></label>
      <input type="text" class="form-control" id="Com_name" placeholder="ชื่อกรรมการ" name="Com_name" ng-model="Com_name"/>
      </div>
       <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
      <label><h3>วันที่เริ่มคำสั่ง:</h3></label>
      <input type="date" class="form-control" id="start" placeholder="วันที่เริ่มคำสั่ง" name="start" ng-model="start"/>
      </div>
      <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
      <label><h3>วันที่สิ้นสุดคำสั่ง:</h></label>
      <input type="date" class="form-control" id="end" placeholder="วันที่สิ้นสุดคำสั่ง" name="end" ng-model="end"/>
      </div>
      <div class="col-lg-4 col-xs-12 col-lg-offset-4" >
      <label><h3>link:</h3></label>
      <input type="text" class="form-control" id="link" placeholder="link" name="link" ng-model="link"/>
      </div>
      </div>
      
      <center>
      <center><button class="btn btn-info btn-lg">Insert</button>
              <button class="btn btn-danger btn-lg" ng-click="Cancel()">Cancel</button></center>
      </center>
    </form>
    </div>
    <script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
    $scope.counter = 0;
    $scope.Plus = function() {
       $scope.counter++;
    }
    });
  
    $('#submit').on('click',function(event) {
			var valid = true,
			errorMessage = "";
      if($('#genid').val() == ''){
				errorMessage = "กรุณาใส่เลขที่คำสั่ง \n";
				valid = false;
			}
      if($('#name').val() == ''){
				errorMessage += "กรุณาใส่ชื่อคำสั่ง \n";
				valid = false;
			}
      if($('#start').val() == ''){
				errorMessage += "กรุณาใสวันเริ่มต้น \n";
				valid = false;
			}
      
      if( !valid && errorMessage.length > 0){
				alert(errorMessage);
				event.preventDefault();
			}

    })
    </script>
</body>

</html>
