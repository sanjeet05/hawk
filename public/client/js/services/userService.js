angular.module('UserService', []).factory('User', ['$resource',
  function ($resource) {
    return $resource('/api/user/:userId', {
      userId: '@id'
    }, {
      update: {
        method: 'PUT'
      },
      signup: {
        method: 'POST',
        url: '/api/user/signup'
      }
    });
  }
]);
