myApp.controller('userController', ['$scope', '$location', 'userModel',
    function ($scope, $location, userModel) {
        angular.extend($scope, {
            login: {
                username: 'chris@scotch.io',
                password: 'secret'
            }
        });
        angular.extend($scope, {
            doLogin: function (loginForm) {
                var data = {
                    email: $scope.login.username,
                    password: $scope.login.password
                };

                userModel.doLogin(data).then(function () {
                    $location.path('dashboard');
                });
            },
            doLogout: function () {
                userModel.doUserLogout();
                $location.path('/login');
            }
        });
    }]);