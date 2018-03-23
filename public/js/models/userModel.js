myApp.factory('userModel', ['$http', '$cookies', function ($http, $cookies) {
    var userModel = {};
    /**
     *
     * @param loginData
     * @returns {*}
     */
    userModel.doLogin = function (loginData) {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + 'authenticate',
            method: 'POST',
            data: {
                email: loginData.email,
                password: loginData.password
            }
        }).then(function (response) {
            // console.log(response.data.user);
            $cookies.put('auth', JSON.stringify(response.data.user));
        });
    };

    /**
     *
     * @returns {boolean}
     */
    userModel.getAuthStatus = function () {
        var status = angular.fromJson($cookies.get('auth'));
        if (status) {
            return true;
        } else {
            return false;
        }
    };

    /**
     *
     * @returns {Object|Array|string|number}
     */
    userModel.getUserObject = function () {
        var userObj = angular.fromJson($cookies.get('auth'));
        return userObj;
    };

    /**
     *
     */
    userModel.doUserLogout = function () {
        $cookies.remove('auth');
    };
    return userModel;
}])