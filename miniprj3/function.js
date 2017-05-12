var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.insertData = function() {
        $http.post("insert.php", {
                'code': $scope.code,
                'AP_name': $scope.AP_name,
                'Com_name': $scope.Com_name,
                'start': $scope.start,
                'end': $scope.end,
                'link': $scope.link
            })
            .then(function(data) {
                document.location = "index.html";
            });
    }
    $scope.displayData = function() {
        $http.get("getall.php").then(function(response) {
            $scope.names = response.data.records;
        });
    }
    $scope.cancelData = function() {
        document.location = "index.html";
    }
    $scope.deleteData = function() {
        $http.get("delete.php?id=<?php echo $_GET['id'];?>").then(function(data) {
            document.location = "index.html";
        });
    }
    $scope.statusData = function(id) {
        $http.get("status.php?id=" + id).then(function(data) {
            $scope.displayData();
        });
    }
    $scope.start = "1990";
    $scope.end = "2030";
    $scope.select = ["1990", "1991", "1992", "1993", "1994", "1995", "1996", "1997", "1998", "1999", "2000",
        "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010",
        "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020",
        "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030"
    ];
    $scope.time = function() {

        $http.get("getall.php?start=" + $scope.start + "&end=" + $scope.end).then(function(response) {
            $scope.names = response.data.records;
        });
    }
    $scope.orderBy = function(order) {
        $scope.Order = order;
    }
});