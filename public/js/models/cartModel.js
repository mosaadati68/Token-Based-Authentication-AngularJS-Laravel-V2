myApp.factory('cartModel', ['$http', function ($http) {
    return {
        getAllCart: function () {
            return $http.get(baseUrl + 'showCart');
        },
        deleteItem:function (data) {
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

        }
    }
}]);