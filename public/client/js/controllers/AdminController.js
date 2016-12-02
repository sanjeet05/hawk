angular.module('AdminController', [])

// Login Controller
.controller("AdminHomeCtrl", function($scope, $rootScope, $state, $http, $auth) {

  $scope.initAdmin=function () {
    $http.get('http://localhost:8000/api/v1/getAllUsers')
        .then(
            function(response) {
                $scope.users=response.data.result;
            },
            function(error) {
              $scope.errorText=error.data.error;
                console.log(error);
            }
        );
  };
  $scope.edit=function (email) {
    $http.get('http://localhost:8000/api/v1/getUserDetails', {'email':email})
        .then(
            function(response) {
                console.log(response.data.result);
            },
            function(error) {
              $scope.errorText=error.data.error;
                console.log(error);
            }
        );
  };


});
