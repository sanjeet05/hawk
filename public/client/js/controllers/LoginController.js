angular.module('LoginController', [])

// Login Controller
.controller("LoginCtrl", function($scope, $rootScope, $state, $http, $localStorage, $auth) {

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
          if (!isValid) {
            $scope.$broadcast('show-errors-check-validity', 'userForm');
            return false;
          }
          $auth.login($scope.credentials).then(
            function(response) {
              console.log(response.data);
              if(response.data.result == "wrong email or password."){
                console.log("wrong email or password.");
              }
              else{
                $state.go('home');
              }


            },
            function(error) {
              $scope.loginErrorText = error.data.error;
              console.log($scope.loginErrorText);
            }
          );

        };


    })
    .controller("SignupCtrl", function($scope, $rootScope, $state, $localStorage) {

      $scope.signup = function (isValid) {
        // $scope.error = null;
        if (!isValid) {
          $scope.$broadcast('show-errors-check-validity', 'userForm');

          return false;
        }
      }

    });
