var app = angular.module('myApp', []);

app.controller('MainController', function($scope, $http) {
    $http.get('data.json')
        .then(function(response) {
            $scope.data = response.data;
        }, function(error) {
            console.error('Error fetching data:', error);
        });
});
