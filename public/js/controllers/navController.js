myApp.controller('navController', ['$scope', '$location', 'userModel', 'cartModel',
    function ($scope, $location, userModel, cartModel) {
        angular.extend($scope, {
            user: userModel.getUserObject(),
            countCart: cartModel.getCountCart().then(function (response) {
                $scope.countCart = response.data;
            }),
            navUrlLeft: [{
                link: 'Home',
                url: '/dashboard',
                subMenu: [{
                    link: 'View Gallery',
                    url: '/gallery/view'
                }, {
                    link: 'Add Gallery',
                    url: '/gallery/add'
                }]
            }]
        });

        cartModel.getAllCart().then(function (response) {
            $scope.itemCart = response.data.Cart;
        }),

        angular.extend($scope, {
            doLogout: function () {
                userModel.doUserLogout();
                $location.path('/');
            },

            checkActiveLink: function (routeLink) {
                if ($location.path() == routeLink) {
                    return 'make-active';
                }
            }
        });
    }]);