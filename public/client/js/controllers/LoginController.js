angular.module('LoginController', [])

// Login Controller
.controller("LoginCtrl", function($scope, $rootScope, $state, $http, $localStorage) {

  $scope.login = function () {
     console.log($scope.credentials);
     $http.post('http://localhost:8000/api/v1/login', $scope.credentials)
      .then(
        function(response) {console.log(response);},
        function(response) { console.log(response);}
      );
     };



})
.controller("SignupCtrl", function($scope, $rootScope, $state, $localStorage) {

});
