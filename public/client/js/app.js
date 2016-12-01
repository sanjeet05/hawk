// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ui.router', 'ui.bootstrap', 'ui.bootstrap.showErrors' ,'ngMessages', 'ngStorage', 'LoginController', 'AdminController', 'controllers', 'satellizer',  'internationalPhoneNumber', 'ngIntlTelInput'])


// for title
.run(['$rootScope', '$state', '$stateParams', '$auth',
    function($rootScope, $state, $stateParams, $auth) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
        console.log($auth.getPayload);
        // for login/logout
        $rootScope.authentication=$auth;
        $rootScope.logout=function () {
          console.log("logout");
          $auth.logout().then(function () {
            localStorage.removeItem("userName");
            localStorage.removeItem("userRole");
            $state.go('login');
          });
        };
    }
])

.config(function($stateProvider, $urlRouterProvider, $authProvider) {

    $stateProvider

        .state('login', {
            url: "/login",
            templateUrl: "client/templates/login.html",
            data: {
                pageTitle: 'LogIn'
            },
            controller: 'LoginCtrl'
        })
        .state('signup', {
            url: "/signup",
            templateUrl: "client/templates/signup.html",
            data: {
                pageTitle: 'SignUp'
            },
            controller: 'SignupCtrl'
        })

        .state('profile', {
            url: "/profile",
            templateUrl: "client/templates/profile.html",
            // data: {
            //     pageTitle: 'Profile'
            // },
            // controller: 'ProfileCtrl'

        .state('home', {
            url: "/home",
            templateUrl: "client/templates/home.html",
            data: {
                pageTitle: 'Home'
            },
            controller: 'HomeCtrl'
        })
        .state('adminHome', {
            url: "/adminHome",
            templateUrl: "client/templates/admin-home.html",
            data: {
                pageTitle: 'Admin Home'
            },
            controller: 'AdminHomeCtrl'

        })

    // if you have menu then routes like that
    // .state('app', {
    //    url: "/app",
    //    abstract: true,
    //    templateUrl: "templates/menu.html",
    //  })

    // .state('app.addContacts', {
    //   url: "/addContacts",
    //   views: {
    //     'menuContent': {
    //       templateUrl: "templates/addContacts.html",
    //       controller: 'addContactsCtrl'
    //     }
    //   }
    // })


    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = 'http://localhost:8000/api/v1/authenticate/login';
    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/login');

});
