myApp.factory('cartModel', ['$http', function ($http) {
    return {
        getAllCart: function () {
            return $http.get(baseUrl + 'showCart');
        },
    }
}]);