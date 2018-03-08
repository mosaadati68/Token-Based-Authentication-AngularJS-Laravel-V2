myApp.controller('navController', ['$scope', '$location', 'userModel', function ($scope, $location, userModel) {
    angular.extend($scope, {
        user: userModel.getUserObject(),
        navUrlLeft: [{
            link: 'Home',
            url: '/dashboard'
        }, {
            link: 'Profile',
            url: '/profile',
            subMenu: [{
                link: 'View Profile',
                url: '/profile/view'
            }]
        }],

        navUrlRight: [{
            link: 'Profile',
            url: '/profile',
            subMenu: [{
                link: 'View Profile',
                url: '/profile/view'
            }]
        }]
    });
    angular.extend($scope, {
        doLogout: function () {
            userModel.doUserLogout();
            $location.path('/');
        }
    });
}]);