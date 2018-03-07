var myApp = angular.module('myApp', ['ngRoute', 'ngCookies', 'satellizer']);

myApp.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider) {
        $routeProvider.when('/login', {
            templateUrl: '/templates/users/login.html',
            controller: 'userController'
        }).when('/dashboard', {
            templateUrl: '/templates/users/dashboard.html',
            controller: 'userController',
            authenticated: true
        }).when('/', {
            templateUrl: '/templates/home.html',
            controller: 'userController',
            authenticated: true
        }).when('/register', {
            templateUrl: '/templates/users/register.html',
            controller: 'userController'
        }).when('/profile', {
            templateUrl: '/templates/users/profile.html',
            controller: 'userController',
            authenticated: true
        }).otherwise('/');
    }
]);

myApp.run(['$rootScope', '$location', 'userModel',
    function ($rootScope, $location, userModel) {
        $rootScope.$on('$routeChangeStart',
            function (event, next, current) {
                if (next.$$route.authenticated) {
                    if (!userModel.getAuthStatus()) {
                        $location.path('/');
                    }
                }
                if (next.$$route.originalPath == '/') {
                    if (userModel.getAuthStatus()) {
                        $location.path(current.$$route.originalPath);
                    }
                }
            });
    }
]);