angular.module('ProfileCtrl', [])

// Login Controller
.controller("ProfileCtrl", function($scope, $rootScope, $state, $http, $auth) {

  $scope.initEditProfile=function () {
    var userEmail=localStorage.getItem("userEmail");
    var data={'email':userEmail};
    $http.get('/api/v1/user/getUserDetails', {params:data})
        .then(
            function(response) {
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
    $http.post('/api/v1/user/updateProfile', $scope.credentials)
        .then(
            function(response) {
              localStorage.setItem("userName", $scope.credentials.name);
              $rootScope.userName = $scope.credentials.name;
            },
            function(error) {
              $scope.errorText=error.data.error;
                console.log(error);
            }
        );
  };

  $scope.changePassword=function (isValid) {
    $scope.errorText = null;
    if (!isValid) {
      $scope.$broadcast('show-errors-check-validity', 'userForm');
      return false;
    }
    if($scope.newPassword != $scope.confirmPassword){
      $scope.errorText = "New Password and Confirm Password is deferent.";
      return false;
    }
    var data={
      "email":localStorage.getItem("userEmail"),
      "password":$scope.newPassword
    };
    console.log(data);
    $http.post('/api/v1/user/changePassword', data)
        .then(
            function(response) {
              console.log();
            },
            function(error) {
              $scope.errorText=error.data.error;
                console.log(error);
            }
        );
  };
});
