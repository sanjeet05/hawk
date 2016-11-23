// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ui.router', 'ui.bootstrap', 'ui.bootstrap.showErrors' ,'ngMessages', 'ngStorage', 'LoginController', 'controllers', 'satellizer'])


// for title
.run(['$rootScope', '$state', '$stateParams',
    function($rootScope, $state, $stateParams) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
    }
])

.config(function($stateProvider, $urlRouterProvider, $authProvider) {
    $stateProvider
        .state('home', {
            url: "/home",
            templateUrl: "client/templates/home.html",
            data: {
                pageTitle: 'Home'
            },
            controller: 'HomeCtrl'
        })
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


    // .state('addContacts', {
    //     url: "/addContacts",
    //     templateUrl: "templates/addContacts.html",
    //     data : { pageTitle: 'Add Contacts' },
    //     controller: 'addContactsCtrl'
    // })
    // .state('editContacts', {
    //     url: "/editContacts",
    //     templateUrl: "templates/editContacts.html",
    //     data : { pageTitle: 'Edit Contacts' },
    //     controller: 'editContactsCtrl'
    // })


    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = 'http://localhost:8000/api/v1/login';
    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/login');
});
