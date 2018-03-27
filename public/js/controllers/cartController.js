myApp.controller('cartController', ['cartModel', '$timeout', '$scope', function (cartModel, $timeout, $scope) {
    cartModel.getAllCart().then(function (response) {
        $timeout(function () {
            $scope.items = response.data;
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
                $timeout(function () {
                    $scope.items = response.data;
                }, 1000);
            })
        }
    });
    angular.extend($scope, {
        UpdateItemCart: function (rowId) {
            data = {
                rowId: rowId,
                qty: $scope.qty,
            },
                console.log(data.qty);
            cartModel.updateItem(data).then(function (response) {
                $scope.messages = response.data;
                console.log(response.data);
            }),
            cartModel.getAllCart().then(function (response) {
                $timeout(function () {
                    $scope.items = response.data;
                }, 1000);
            })
        },
    });
}]);