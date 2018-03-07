myApp.controller('navController', ['$scope','$location', 'userModel', function ($scope, $location, userModel) {
    angular.extend($scope, {
        user: userModel.getUserObject(),
        navUrl: [{
            link: 'Home',
            url: '/dashboard',
            submenu: [{
                link: 'View Gallery',
                url: '/gallery/view'
            }, {
                link: 'Add Gallery',
                url: '/gallery/add'
            }, {
                link: 'Test',
                url: '/dashboard'
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