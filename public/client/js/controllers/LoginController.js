angular.module('LoginController', [])

// Login Controller
.controller("LoginCtrl", function($scope, $rootScope, $state, $http, $auth) {

        // $scope.login = function() {
        //     console.log($scope.credentials);
        //     $http.post('http://localhost:8000/api/v1/login', $scope.credentials)
        //         .then(
        //             function(response) {
        //                 console.log(response);
        //             },
        //             function(response) {
        //                 console.log(response);
        //             }
        //         );
        // };

        $scope.login=function (isValid) {
          $scope.errorText = null;
          if (!isValid) {
            $scope.$broadcast('show-errors-check-validity', 'userForm');
            return false;
          }
          $auth.login($scope.credentials).then(
            function(response) {
              // console.log(response.data);
              if(response.data.result == "invalid_credentials"){
                $scope.errorText="wrong email or password."
                // console.log("wrong email or password.");
              }
              else{
                // $auth.setToken(response.data.result)
                localStorage.setItem("userName", response.data.user_name);
                localStorage.setItem("userRole", response.data.user_role);
                $rootScope.LogedInUserName=response.data.user_name;
                if(response.data.user_role === 'admin') {
                  $state.go('adminHome');
                }
                else{
                  $state.go('home');
                }

              }
            },
            function(error) {
              $scope.errorText = error.data.result;
              // console.log($scope.errorText);
              // console.log(error);
            }
          );
          // console.log($auth.getToken());
        };

    })
    .controller("SignupCtrl", function($scope, $rootScope, $state,$http) {

      $scope.signup = function (isValid) {
        $scope.errorText = null;
        if (!isValid) {
          $scope.$broadcast('show-errors-check-validity', 'userForm');
          return false;
        }
        // console.log($scope.credentials);
        $http.post('http://localhost:8000/api/v1/signup', $scope.credentials)
            .then(
                function(response) {
                    console.log(response);
                    if(response.data.result){
                      $state.go('login');
                    }
                    else{
                      $scope.errorText="error";
                    }
                },
                function(error) {
                  $scope.errorText=error.data.error;
                    console.log(error);
                }
            );
      };

    });
