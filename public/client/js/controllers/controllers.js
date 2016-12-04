angular.module('controllers', [])

// Home Controller
.controller("HomeCtrl", function($scope, $rootScope, $state, $http, $auth) {
    console.log($auth.isAuthenticated());
    $scope.info = function () {
      $scope.userName = localStorage.getItem("userName");

      // $http.get('http://localhost:8000/api/v1/get_user_details')
      //     .then(
      //         function(response) {
      //             $scope.userName =response.data;
      //
      //         },
      //         function(response) {
      //             console.log(response);
      //         }
      //     );
    };

});
