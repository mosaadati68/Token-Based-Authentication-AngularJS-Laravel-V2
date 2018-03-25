myApp.controller('cartController', ['cartModel', '$timeout', '$scope', function (cartModel, $timeout, $scope) {
    cartModel.getAllCart().then(function (response) {
        $timeout(function () {
            $scope.items = response.data;
            console.log(response.data);
        }, 1000);
    });

}]);