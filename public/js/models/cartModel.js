myApp.factory('cartModel', ['$http', function ($http) {
    return {
        getAllCart: function () {
            return $http.get(baseUrl + 'showCart');
        },

        addToCart: function (data) {
            return $http({
                headers: {
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'cart',
                method: 'POST',
                data: {
                    id: data.productId,
                }
            });
        },

        getCountCart: function () {
            return $http.get(baseUrl + 'countCart');
        },

        deleteItem: function (data) {
            return $http({
                headers: {
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'deleteCartItem',
                method: 'POST',
                data: {
                    rowId: data.rowId,
                }
            });

        },

        updateItem: function (data) {
            return $http({
                headers: {
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'updateCartItem',
                method: 'POST',
                data: {
                    rowId: data.rowId,
                    type: data.type
                }
            });

        }
    }
}]);