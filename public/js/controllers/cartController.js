myApp.controller('cartController', ['cartModel', '$timeout', '$scope', 'productModel',
    function (cartModel, $timeout, $scope, productModel) {
        cartModel.getAllCart().then(function (response) {
            $timeout(function () {
                $scope.items = response.data.Cart;
                $scope.subtotal = response.data.total;
            }, 1000);
        });
        angular.extend($scope, {
            deleteItemCart: function (rowId) {
                data = {
                    rowId: rowId
                },
                    cartModel.deleteItem(data).then(function (response) {
                        $scope.messages = response.data;
                    }),
                    cartModel.getAllCart().then(function (response) {
                            $scope.items = response.data.Cart;
                    })
            }
        });

        angular.extend($scope, {
            updateCartItem: function (rowId, type) {
                data = {
                    rowId: rowId,
                    type: type,
                },
                    cartModel.updateItem(data).then(function (response) {
                        $scope.messages = response.data.messages;
                        $scope.subtotal = response.data.total;
                    }),
                    cartModel.getAllCart().then(function (response) {
                        $scope.items = response.data.Cart;
                        $scope.subtotal = response.data.total;
                    })
            },
        });
    }]);