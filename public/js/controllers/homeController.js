myApp.controller('homeController', [
    '$scope', '$location', 'productModel', '$timeout', '$routeParams', 'Lightbox',
    function ($scope, $location, productModel, $timeout, $routeParams, Lightbox) {

        productModel.getAllProducts().then(function (response) {
            $timeout(function () {
                $scope.products = response.data;
                // var productName = [];
                // var productPic = [];
                // angular.forEach(response.data, function (product) {
                //     productName.push(product.product_name);
                //     productPic.push(product.product_pic);
                // });
                // $scope.countryList = productName;
                // $scope.productPic = productPic;
                // $scope.complete=function(string){
                //
                //     var output=[];
                //     angular.forEach(response.data, function(country){
                //         if(country.product_name.toLowerCase().indexOf(string.toLowerCase())>=0){
                //             output.push(country);
                //         }
                //     });
                //     $scope.filterCountry = output;
                //
                // }
                // $scope.fillTextbox=function(string, image){
                //     $scope.country = string;
                //     $scope.filterCountry=null;
                // }
            }, 1000);
        });

        angular.extend($scope, {
            addProductToCart: function (productId) {
                data = {
                    productId: productId
                };

                productModel.addToCart(data).then(function (response) {
                    $scope.messages = response.data;
                });
            }
        });
    }]);