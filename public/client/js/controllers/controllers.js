angular.module('controllers', [])

// Home Controller
.controller("HomeCtrl", function($scope, $rootScope, $state, $http, $auth) {
    console.log($auth.isAuthenticated());
    $scope.info = function () {
      $http.get('http://localhost:8000/api/v1/get_user_details')
          .then(
              function(response) {
                  console.log(response);
              },
              function(response) {
                  console.log(response);
              }
          );
    };

});
