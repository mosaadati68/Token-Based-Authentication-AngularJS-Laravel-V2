myApp.controller('navController', ['$scope', 'userModel', function ($scope, userModel) {
    angular.extend($scope, {
        user: userModel.getUserObject(),
        navUrl: []
    });
}]);