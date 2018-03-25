myApp.controller('homeController', [
    '$scope', '$location', 'productModel', '$timeout', '$routeParams', 'Lightbox',
    function ($scope, $location, productModel, $timeout, $routeParams, Lightbox) {

        productModel.getAllProducts().then(function (response) {
            $timeout(function () {
                var productName = [];
                var productPic = [];
                angular.forEach(response.data, function (country) {
                   productName.push(country.product_name);
                   productPic.push(country.product_pic);
                });
                console.log(productName,productPic);
                $scope.countryList = productName;
                $scope.productPics = productPic;
                $scope.complete = function (string) {

                    var output = [];
                    angular.forEach($scope.countryList, function (country) {
                        if (country.toLowerCase().indexOf(string.toLowerCase()) >= 0) {
                            output.push(country);
                        }
                    });
                    $scope.filterCountry = output;
                }
                $scope.fillTextbox = function (string) {
                    $scope.country = string;
                    $scope.filterCountry = null;
                }
            }, 1000);
        });
    }]);