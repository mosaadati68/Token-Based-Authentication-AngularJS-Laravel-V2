myApp.factory('productModel', ['$http', function ($http) {
    return {
        getAllProducts: function () {
            return $http.get(baseUrl + 'products');
        },
    };
}])