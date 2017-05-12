
<!DOCTYPE html>
<html>
<head>
    <title>Appointment</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
        
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        
        th {
            font-size: 20px;
        }
    </style>
    <script src="function.js"></script>

</head>

<body ng-app="myApp" ng-controller="myCtrl" ng-init="displaydata()">
<!--  <div>
      <nav class="navbar navbar-inverse" style="background-color: #115069;">
           <div class="container-fluid">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                   </button>
               </div>
               <div class="collapse navbar-collapse" id="myNavbar">
                   <center>
                       <form class="navbar-form">
                           <a class="navbar-brand" style="color: white;" href="index.php"></a>
                           <div class="form-group">
                             <input type="text" ng-model="search" placeholder="Search" style="width: 450px">
                             <a href="insert.php" class="btn btn-info navbar-btn">New</a>
                           </div>
                       </form>
                   </center>
               </div>
           </div>
       </nav>
-->

     <div>
        <nav class="navbar navbar-inverse" style="background-color: ##523D1F;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <center>
                        <form class="navbar-form">
                            <a class="navbar-brand" style="color: white;" href="index.php">APPOINTMENT</a>
                            <div class="form-group">
                                <select class="form-control" ng-change="time()" ng-model="timeStart">
                                <option ng-repeat="x in select" value="{{x}}">{{x}}</option>
                                </select>
                            </div>
                            <font color="white">-</font>
                            <div class="form-group">
                                <select class="form-control" ng-change="time()" ng-model="timeFinnish">
                                <option ng-repeat="x in select" value="{{x}}">{{x}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" ng-model="search" placeholder="Search" style="width: 450px">
                            </div>
                            <a href="insert.php" class="btn btn-info navbar-btn">New</a>
                        </form>
                    </center>
                </div>
            </div>
        </nav>
        <center>
            <h1>APPOINTMENT</h1>
        </center>
        <center>
            <table border="2" class="table table-bordered">
                <th style="background-color: #d3d3d3;" ng-click="orderBy('code')">
                    <font color="white">code</font>
                </th>
                <th style="background-color: #d3d3d3;" ng-click="orderBy('AP_name')">
                    <font color="white">Appointment</font>
                </th>
                <th style="background-color: #d3d3d3;" ng-click="orderBy('Com_name')">
                    <font color="white">Committee</font>
                </th>
                <th style="background-color:#d3d3d3;" ng-click="orderBy('start')">
                    <font color="white">Start</font>
                </th>
                <th style="background-color:#d3d3d3;" ng-click="orderBy('end')">
                    <font color="white">end</font>
                </th>
                <th style="background-color: #d3d3d3;" ng-click="orderBy('status')">
                    <font color="white">Status</font>
                </th>
                <th style="background-color:#d3d3d3;" ng-click="orderBy('link')">
                    <font color="white">link</font>
                </th>
                <th style="background-color: #d3d3d3;">
                    <font color="white">Update</font>
                </th>

                <th style="background-color: #d3d3d3;">
                    <font color="white">Delete</font>
                </th>

                <tr ng-repeat="x in names | orderBy: 'Order' | filter : search">
                  <!--orderBy: 'ตามด้วยชื่อ' -->
                    <td>{{ x.Id }}</td>
                    <td>{{ x.Genid }}</td>
                    <td>{{ x.NameCommand }}</td>
                    <td>{{ x.Startdate }}</td>
                    <td>
                      <span ng-if="x.Enddate == '0000-00-00'"><p>ไม่มีวันที่สิ้นสุด</p></span>
                      <span ng-if="x.Enddate != '0000-00-00'">{{ x.Enddate }}</span>
                    </td>
                    <td>
                      <span ng-if="x.Status == 'X'">
                        <input type="checkbox" ng-click="status(x.Id,x.Status)" checked>
                        Expire
                      </span>
                      <span ng-if="x.Status == 'A'">
                        <input type="checkbox" ng-click="status(x.Id,x.Status)" >
                        Active
                      </span>
                    </td>
                    <td>{{ x.Link }} <a href="view.php?id={{x.Id}}" class="btn btn-info btn-xs">View</a></td>
                    <td><a href="edit.php?id={{x.Id}}" class="btn btn-primary btn-xs" ng-click="updatedata(x.Genid,x.NameCommand,x.Startdate,x.Enddate,x.Status,x.Link)">Update</a>
                    </td>
                    <td>
                    <a href="delete.php?id={{x.Id}}" class="btn btn-danger btn-xs" ng-click="deletedata(x.Id)">Delete</a></td>
                </tr>
            </table>
            <div ng-show="!(names|filter : search).length">
            "ไม่พบคำสั่งที่ค้นหา"
            </div>
        </center>
        <div>
    </div>
</body>

</html>
