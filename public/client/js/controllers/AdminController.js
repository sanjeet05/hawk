angular.module('AdminController', [])

// Login Controller
.controller("AdminHomeCtrl", function($scope, $rootScope, $state, $http, $auth, $stateParams) {

  $scope.initAdmin=function () {
    $http.get('http://localhost:8000/api/v1/admin/getAllUsers')
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
  $scope.initEditProfile=function () {
    // var userEmail=localStorage.getItem("userEmail");
    data={'email':$stateParams.userId}
    // $http.get('http://localhost:8000/api/v1/getUserDetails?email='+email)
    $http.get('/api/v1/user/getUserDetails', {params:data})
        .then(
            function(response) {
                console.log(response.data.result);
                $scope.credentials = response.data.result[0];
            },
            function(error) {
              $scope.errorText=error.data.error;
                console.log(error);
            }
        );
  };
  $scope.update=function (isValid) {
    $scope.errorText = null;
    if (!isValid) {
      $scope.$broadcast('show-errors-check-validity', 'userForm');
      return false;
    }
    $http.post('/api/v1/admin/updateUser', $scope.credentials)
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
  $scope.delete=function (userEmail) {
    console.log(userEmail);
    $http.post('/api/v1/admin/deleteUser', {'email':userEmail})
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
