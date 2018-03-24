myApp.controller('productController', [
    '$scope', '$location', 'productModel', '$timeout', '$routeParams', 'Lightbox',
    function ($scope, $location, productModel, $timeout, $routeParams, Lightbox) {
        productModel.getAllProducts().then(function (response) {
            $timeout(function () {
                $scope.products = response.data;
                $scope.showProducts = true;
            }, 1000);
        });
    }]);