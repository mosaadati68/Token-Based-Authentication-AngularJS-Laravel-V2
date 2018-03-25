myApp.factory('productModel', ['$http', function ($http) {
    return {
        getAllProducts: function () {
            return $http.get(baseUrl + 'products');
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
        }
    };
}])