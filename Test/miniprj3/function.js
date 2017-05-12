var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.link = "http://www.khonkaenmarathon.com/7th-2010info/committee/new_ad.jpg";

  $scope.datestart='1995';
  $scope.dateend='2025';
  $scope.select = ["1995","1996","1997","1998","1999","2000",
                   "2001","2002","2003","2004","2005","2006",
                   "2007","2008","2009","2010","2011","2012",
                   "2013","2014","2015","2016","2017","2018",
                   "2019","2020","2021","2022","2023","2024","2025"];

    $scope.insertData = function() {
          $http.post("insert.php", {
            'Code': $scope.Code,
            'nameAppoint': $scope.nameAppoint,
            'committee': $scope.committee,
            'datestart': $scope.datestart,
            'dateend': $scope.dateend,
            'link': $scope.link
          })
          .then(function(data) {
           
              window.location.href = "index.html";
          });
    }
    $scope.displayData = function() {
      $http.get("getall.php").then(function(response){
        $scope.names = response.data.records;
      });
    }
    //update date function
    $scope.updateData = function(id) {
      document.location = "edit.php?id=" + id;
    }
    $scope.removeData = function(id) {
      $http.get("delete.php?id="+id).then(function(data) {
        document.location = "index.html";
      });
    }
    $scope.statusData = function(id) {
      $http.get("upstatus.php?id="+id).then(function(data) {
        $scope.displayData();
      });
    }
       

      $scope.addNewCommittee = function() {
                var newItemNo = $scope.committee.length + 1;
                $scope.committee.push({
                    'id': 'committee' + newItemNo
                });
            }

    $scope.yearData = function(){
      $http.get("getall.php?datestart=" + $scope.datestart + "&dateend=" + $scope.dateend)
      .then(function(response) {
        $scope.names = response.data.records;
      });
    }
});
