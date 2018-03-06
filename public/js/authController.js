'use strict';

myApp.controller('AuthController',
    function AuthController($auth, $location) {
        var vm = this;

        vm.login = function () {

            var credentials = {
                email: vm.email,
                password: vm.password
            }

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function (data) {
                console.log(data.data.token);
                // If login is successful, redirect to the users state
                $location.path('users', data, {});
            });
        }

    });
